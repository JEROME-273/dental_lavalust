<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller {

    public function __construct()
    {
        parent::__construct();
        if(segment(2) != 'logout') {
            if(logged_in()) {
                redirect('home');
            }
        }
        $this->call->library('email');
    }
	
    public function index() {
        $this->call->view('auth/login');
    }  

    public function login() {
        if ($this->form_validation->submitted()) {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
    
            $data = $this->lauth->login($email, $password);
    
            if (empty($data)) {
                $this->session->set_flashdata(['is_invalid' => 'is-invalid']);
                $this->session->set_flashdata(['err_message' => 'These credentials do not match our records.']);
                redirect('auth/login');
            } elseif (is_null($data['email_verified_at'])) {
                set_flash_alert('danger', 'Your email is not verified. Please check your email.');
                redirect('auth/login');
            } else {
                $this->lauth->set_logged_in($data['id']);
                
                // Get user role and redirect accordingly
                $role = $this->lauth->get_user_role($data['id']);
                if ($role === 'admin') {
                    redirect('adminpage');  // Create this route and controller
                } else {
                    redirect('home');
                }
            }
        } else {
            $this->call->view('auth/login');
        }
    }

    public function verify_email() {
        $token = $this->io->get('token');
        
        // Debugging: Log the received token
        error_log('Received token: ' . $token);
        
        if (!empty($token)) {
            if ($this->lauth->verify_email($token)) {
                set_flash_alert('success', 'Your email has been verified! You can now log in.');
                redirect('auth/login');
            } else {
                // Debugging: Log verification failure
                error_log('Email verification failed for token: ' . $token);
                set_flash_alert('danger', 'Invalid or expired token.');
            }
        } else {
            set_flash_alert('danger', 'Verification token is missing.');
        }
        redirect('auth/login');
    }

    // private function send_verification_email($email, $email_token) {
    //     $verification_link = base_url() . 'auth/verify_email?token=' . $email_token;
    
    //     $email_body = "
    //         Hi,
    //         Please verify your email by clicking on the link below:
    //         $verification_link
    //         If you did not request this, please ignore this email.
    //     ";
    
    //     $this->email->recipient($email);
    //     $this->email->subject('Verify Your Email');
    //     $this->email->sender('dentalclinic@gmail.com');
    //     $this->email->email_content($email_body, 'text');
    //     $this->email->send();
    // }

    private function send_verification_email($email, $email_token) {
        $template = file_get_contents(ROOT_DIR.PUBLIC_DIR.'/templates/verify_email.html');
        $search = array('{token}', '{base_url}');
        $replace = array($email_token, base_url());
        $template = str_replace($search, $replace, $template);
        
        $this->email->recipient($email);
        $this->email->subject('Email Verification'); // Change based on subject
        $this->email->sender('noreply@example.com'); // Change based on sender email
        $this->email->reply_to('support@example.com'); // Change based on reply-to email
        $this->email->email_content($template, 'html');
        $this->email->send();
    }
    
    

    public function register() {
        if ($this->form_validation->submitted()) {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $email_token = bin2hex(random_bytes(50));
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $street = $this->io->post('street');
            $barangay = $this->io->post('barangay');
            $city = $this->io->post('city');
            $zip_code = $this->io->post('zip_code');
            $phone_number = $this->io->post('phone_number');
    
            $this->form_validation
                ->name('username')->required()->is_unique('users', 'username', $username, 'Username was already taken.')
                ->name('password')->required()->min_length(5, 'Password must not be less than 5 characters.')
                ->name('password_confirmation')->required()->matches('password', 'Passwords did not match.')
                ->name('email')->required()->is_unique('users', 'email', $email, 'Email was already taken.');
    
            if ($this->form_validation->run()) {
                if ($this->lauth->register($username, $email, $password, $email_token, $first_name, $last_name, $street, $barangay, $city, $zip_code, $phone_number)) {
                    $this->send_verification_email($email, $email_token);
                    set_flash_alert('success', 'Registration successful! Please check your email to verify your account.');
                    redirect('auth/login');
                } else {
                    set_flash_alert('danger', config_item('SQLError'));
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
                redirect('auth/register');
            }
        } else {
            $this->call->view('auth/register');
        }
    }
    
    

    private function send_password_token_to_email($email, $token) {
		$template = file_get_contents(ROOT_DIR.PUBLIC_DIR.'/templates/reset_password_email.html');
		$search = array('{token}', '{base_url}');
		$replace = array($token, base_url());
		$template = str_replace($search, $replace, $template);
		$this->email->recipient($email);
		$this->email->subject('LavaLust Reset Password'); //change based on subject
		$this->email->sender('sample@email.com'); //change based on sender email
		$this->email->reply_to('sample@email.com'); // change based on sender email
		$this->email->email_content($template, 'html');
		$this->email->send();
	}

	public function password_reset() {
		if($this->form_validation->submitted()) {
			$email = $this->io->post('email');
			$this->form_validation
				->name('email')->required()->valid_email();
			if($this->form_validation->run()) {
				if($token = $this->lauth->reset_password($email)) {
					$this->send_password_token_to_email($email, $token);
                    $this->session->set_flashdata(['alert' => 'is-valid']);
				} else {
					$this->session->set_flashdata(['alert' => 'is-invalid']);
				}
			} else {
				set_flash_alert('danger', $this->form_validation->errors());
			}
		}
		$this->call->view('auth/password_reset');
	}

    public function set_new_password() {
        if($this->form_validation->submitted()) {
            $token = $this->io->post('token');
			if(isset($token) && !empty($token)) {
				$password = $this->io->post('password');
				$this->form_validation
					->name('password')
						->required()
						->min_length(8, 'New password must be atleast 8 characters.')
					->name('re_password')
						->required()
						->min_length(8, 'Retype password must be atleast 8 characters.')
						->matches('password', 'Passwords did not matched.');
						if($this->form_validation->run()) {
							if($this->lauth->reset_password_now($token, $password)) {
								set_flash_alert('success', 'Password was successfully updated.');
							} else {
								set_flash_alert('danger', config_item('SQLError'));
							}
						} else {
							set_flash_alert('danger', $this->form_validation->errors());
						}
			} else {
				set_flash_alert('danger', 'Reset token is missing.');
			}
    	redirect('auth/set-new-password/?token='.$token);
        } else {
             $token = $_GET['token'] ?? '';
            if(! $this->lauth->get_reset_password_token($token) && (! empty($token) || ! isset($token))) {
                set_flash_alert('danger', 'Invalid password reset token.');
            }
            $this->call->view('auth/new_password');
        }
		
	}

    public function logout() {
        if($this->lauth->set_logged_out()) {
            redirect('auth/login');
        }
    }

}
?>
