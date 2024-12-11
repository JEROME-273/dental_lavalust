<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users extends Controller {

    public function __construct(){
        parent::__construct();
        $this->call->model('Dental_uModel');
    }


    public function Appoint() {
        // Fetch all services
        $data['services'] = $this->Dental_uModel->get_all_services();
        $this->call->view('users/appointments', $data);
    }
    
    public function create_appoint(){
        if($this->form_validation->submitted()){
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');
            $phone = $this->io->post('phone');
            $Address = $this->io->post('Address');
            $appointment_date = $this->io->post('appointment_date');
            $service_id = $this->io->post('service_id');

            if ($this->Dental_uModel->makeAppoint($first_name,$last_name,$email,$phone,$Address,$appointment_date,$service_id)) {
                set_flash_alert('success', 'Appointment Set!');
                redirect('home');
            }
        } else {
            set_flash_alert('danger', $this->form_validation->errors());
            redirect('users/appointments');
        }

    }
    
    public function service(){
        $this->call->view('users/services');
    }
    public function consult(){
        $this->call->view('users/eConsultation');
    }
    // public function feed(){
    //     $this->call->view('users/feedback');
    // }
    public function faqs(){
        $this->call->view('users/FAQs');
    }

    public function message(){
        if($this->form_validation->submitted()){
            $fullname = $this->io->post('full_name');
            $email = $this->io->post('email');
            $contact_number = $this->io->post('contact_number');
            $concern = $this->io->post('concerns');

            if ($this->Dental_uModel->create_mess($fullname,$email,$contact_number,$concern)) {
                set_flash_alert('success', 'message sent');
                redirect('home');
            }
        }else {
            set_flash_alert('danger', $this->form_validation->errors());
            redirect('home');
        }
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $symptoms = $_POST['symptoms'] ?? [];
            $duration = $_POST['duration'];
            $previousVisit = $_POST['previous_visit'];

            $prescription = $this->Dental_uModel->generatePrescription($symptoms, $duration, $previousVisit);

            // You might want to pass this to a view or return it as JSON, depending on your needs
            $this->call->view('users/prescription', ['prescription' => $prescription]);
        } else {
            // Handle GET request or show the form
            $this->call->view('users/eConsultation');
        }
    }

    public function Profile(){
       $data = $this->Dental_uModel->getCurrentUser();
        $this->call->view('users/profile', $data);
    }

}

?>