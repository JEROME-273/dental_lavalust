<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin extends Controller {

    public function __construct() {
        parent::__construct();
        
        // Check if the user is logged in and is an admin
        if (!$this->lauth->is_logged_in() || $this->lauth->get_user_role($this->lauth->get_user_id()) !== 'admin') {
            redirect('auth/login');
        }
        
        // Load the database
        $this->call->database();
    }

    public function index() {
        // Fetch appointments from the database (adjust according to your database structure)
        $appointments = $this->db->table('appointments')
                                 ->select('appointments.appointment_id, patients.first_name, patients.last_name, appointments.appointment_date, services.service_name, appointments.status')
                                 ->join('patients', 'appointments.patient_id = patients.patient_id')
                                 ->join('services', 'appointments.service_id = services.service_id')
                                 ->get_all();

        // Pass the $appointments data to the view
        $this->call->view('admin/adminpage', ['appointments' => $appointments]);
    }
}
