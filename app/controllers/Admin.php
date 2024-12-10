<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin extends Controller {
    public function __construct() {
        parent::__construct();
        // Middleware to check if user is admin
        if (!$this->is_admin()) {
            redirect('home');
        }
    }

    private function is_admin() {
        if (!logged_in()) return false;
        $user_id = $this->lauth->get_user_id();
        return $this->lauth->get_user_role($user_id) === 'admin';
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

    public function dashboard() {
        $this->call->view('admin/adminpage');
    }

    public function report(){
        // $appointment = $this->db->table('appointments')
                        

        $this->call->view('admin/report');
    }

    public function users(){

        $this->call->view('admin/users');

    }

    public function feeds(){
        $this->call->view('admin/feedback');
    }
}
?>