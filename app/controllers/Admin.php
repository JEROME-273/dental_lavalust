<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('Dental_uModel');
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

    // Dashboard for Admin
    public function index() {
        // Get search values from the POST request
        $search_patient = isset($_POST['search_patient']) ? $_POST['search_patient'] : '';
        $search_service = isset($_POST['search_service']) ? $_POST['search_service'] : '';
        $search_status = isset($_POST['search_status']) ? $_POST['search_status'] : '';
    
        // Pass the search parameters to the model
        $appointments = $this->Dental_uModel->getAppointments($search_patient, $search_service, $search_status);
        
        // Pass the appointments and search values to the view
        $this->call->view('admin/adminpage', [
            'appointments' => $appointments,
            'search_patient' => $search_patient,
            'search_service' => $search_service,
            'search_status' => $search_status
        ]);
    }
    

    // Dashboard view
    public function dashboard() {
        $this->call->view('admin/adminpage');
    }

    // Report view
    public function report() {
        $total_patients = $this->Dental_uModel->getTotalPatients();
        $monthly_patient_data = $this->Dental_uModel->getPatientsPerMonth();
        $service_patient_data = $this->Dental_uModel->getServicesChosen();
    
        $this->call->view('admin/report', [
            'total_patients' => $total_patients,
            'monthly_patient_data' => $monthly_patient_data,
            'service_patient_data' => $service_patient_data
        ]);
    }
    

    // Users management
    public function users() {
        $data['users'] = $this->Dental_uModel->getAllUsers();
        $this->call->view('admin/users',$data);
    }

    // Feedback section
    public function feeds() {
        $data['message'] = $this->Dental_uModel->getALlMessage();
        $this->call->view('admin/feedback',$data);
    }

     // Method to update appointment status (AJAX)
     public function update_status() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $appointmentId = $_POST['id'];
            $status = $_POST['status'];

            if ($this->Dental_uModel->updateAppointmentStatus($appointmentId, $status)) {
                echo json_encode(['status' => 'success', 'message' => 'Appointment status updated successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error updating appointment status.']);
            }
        }
    }
}
?>
