<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Appointment extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->call->model('AppointmentModel');
        $this->call->helper('url');
        $this->call->library('session');
        
        // Check if user is logged in
        if (!$this->session->has_userdata('username')) {
            redirect('login');
        }
    }

    public function index() {
        $data['services'] = $this->AppointmentModel->get_services();
        $data['booked_dates'] = $this->AppointmentModel->get_booked_dates();
        
        if ($this->form_validation->submitted()) {
            $this->process_booking();
        }
        
        $this->call->view('appointment_form', $data);
    }

    private function process_booking() {
        $firstName = $this->io->post('first_name');
        $lastName = $this->io->post('last_name');
        $email = $this->io->post('email');
        $phone = $this->io->post('phone');
        $appointmentDate = $this->io->post('appointment_date');
        $serviceId = $this->io->post('service_id');

        $appointmentCount = $this->AppointmentModel->get_appointment_count($appointmentDate);

        if ($appointmentCount >= 3) {
            $this->session->set_flashdata('error', 'This date is fully booked. Please choose another date.');
        } else {
            $patientId = $this->AppointmentModel->insert_patient($firstName, $lastName, $email, $phone);
            $this->AppointmentModel->insert_appointment($patientId, $appointmentDate, $serviceId);
            $this->session->set_flashdata('success', 'Appointment successfully booked!');
        }

        redirect('appointment');
    }
}