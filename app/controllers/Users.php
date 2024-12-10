<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users extends Controller {

    public function __construct(){
        parent::__construct();
        $this->call->model('dental_uModel');
    }


    public function Appoint() {
        // Fetch all services
        $data['services'] = $this->dental_uModel->get_all_services();
        $data['bookedDates'] = $this->Dental_Umodel->get_booked_dates();

        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('first_name')->required()
                ->name('last_name')->required()
                ->name('email')->required()->valid_email()
                ->name('phone')->required()
                ->name('appointment_date')->required()
                ->name('service_id')->required();
            
            if ($this->form_validation->run()) {
                $appointmentDate = $this->io->post('appointment_date');
                $appointmentCount = $this->Dental_Umodel->check_appointment_count($appointmentDate);
                
                if ($appointmentCount >= 3) {
                    $this->session->set_flashdata('error', 'This date is fully booked. Please choose another date.');
                } else {
                    $patientData = [
                        'first_name' => $this->io->post('first_name'),
                        'last_name' => $this->io->post('last_name'),
                        'email' => $this->io->post('email'),
                        'phone' => $this->io->post('phone')
                    ];
                    
                    $appointmentData = [
                        'appointment_date' => $appointmentDate,
                        'service_id' => $this->io->post('service_id')
                    ];
                    
                    $this->Dental_Umodel->book_appointment($patientData, $appointmentData);
                    $this->session->set_flashdata('success', 'Appointment successfully booked!');
                }
                
                redirect('Appoint');
            }
        }

        $this->call->view('appointments', $data);
    }
    
    
    public function service(){
        $this->call->view('users/services');
    }
    public function consult(){
        $this->call->view('users/eConsultation');
    }
    public function feed(){
        $this->call->view('users/feedback');
    }
    public function faqs(){
        $this->call->view('users/FAQs');
    }

    public function message(){
        if($this->form_validation->submitted()){
            $fullname = $this->io->post('full_name');
            $email = $this->io->post('email');
            $contact_number = $this->io->post('contact_number');
            $concern = $this->io->post('concerns');

            if ($this->dental_uModel->create_mess($fullname,$email,$contact_number,$concern)) {
                set_flash_alert('success', 'message sent');
                redirect('home');
            }
        }else {
            set_flash_alert('danger', $this->form_validation->errors());
            redirect('home');
        }
    }

    

}

?>