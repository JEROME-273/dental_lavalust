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
    
    public function create_appoint() {
        if ($this->form_validation->submitted()) {
            $appointment_date = $this->io->post('appointment_date');
            $appointment_time = $this->io->post('appointment_time');
            
            // Check if the time slot is available
            if (!$this->Dental_uModel->isTimeSlotAvailable($appointment_date, $appointment_time)) {
                set_flash_alert('danger', 'The selected time slot is already booked. Please choose another time.');
                redirect('appointment');
                return;
            }
    
            $data = array(
                'user_id' => $this->lauth->get_user_id(),
                'fname' => $this->io->post('first_name'),
                'lname' => $this->io->post('last_name'),
                'email' => $this->io->post('email'),
                'phone' => $this->io->post('phone'),
                'address' => $this->io->post('Address'),
                'appointment_date' => $appointment_date,
                'appointment_time' => $appointment_time,
                'service_id' => $this->io->post('service_id'),
                'status' => 'pending'
            );
    
            if ($this->Dental_uModel->makeAppoint($data)) {
                set_flash_alert('success', 'Appointment Set!');
                redirect('appointment');
            } else {
                set_flash_alert('danger', 'Failed to create appointment');
                redirect('appointment');
            }
        }
    }
    
    
    public function service(){
        $this->call->view('users/services');
    }
    public function consult(){
        $this->call->view('users/eConsultation');
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
        $user_id = $this->lauth->get_user_id(); // Assuming you have a method to get the logged-in user ID
        $data['user'] = $this->Dental_uModel->getCurrentUser($user_id);
        $this->call->view('users/profile', $data);
    }

    public function update_profile(){
        if($this->form_validation->submitted()){
            $user_id = $this->lauth->get_user_id();
            $data = [
                'username' => $this->io->post('username'),
                'first_name' => $this->io->post('first_name'),
                'last_name' => $this->io->post('last_name'),
                'email' => $this->io->post('email'),
                'phone_number' => $this->io->post('phone_number'),
                'street' => $this->io->post('street'),
                'barangay' => $this->io->post('barangay'),
                'city' => $this->io->post('city'),
                'zip_code' => $this->io->post('zip_code')
            ];

            if ($this->Dental_uModel->updateUser($user_id, $data)) {
                set_flash_alert('success', 'Profile updated successfully!');
                redirect('user-profile');
            } else {
                set_flash_alert('danger', 'Failed to update profile.');
                redirect('user-profile');
            }
        }
    }
    public function viewAppointments() {
        if (!$this->lauth->is_logged_in()) {
            redirect('auth/login');
        }
        
        $user_id = $this->lauth->get_user_id();
        $data['appointments'] = $this->Dental_uModel->getUserAppointments($user_id);
        $this->call->view('users/view-appointments', $data);
    }
    
    public function checkSlots() {
        $date = $this->io->get('date');
        $count = $this->Dental_uModel->getAppointmentCountForDate($date);
        
        header('Content-Type: application/json');
        echo json_encode(['count' => $count]);
        exit;
    }
    public function delete_appointment() {
        if (!$this->lauth->is_logged_in()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }
    
        $appoint_id = $this->io->post('appoint_id');
        $user_id = $this->lauth->get_user_id();
    
        // Add method to Dental_uModel
        if ($this->Dental_uModel->deleteAppointment($appoint_id, $user_id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete appointment']);
        }
    }

}

?>