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

    // Add this new method to get today's appointments
public function getTodayAppointments() {
    return $this->db->table('appoint')
        ->select('appoint.*, services.service_name')
        ->join('services', 'appoint.service_id = services.service_id')
        ->where('DATE(appointment_date)', date('Y-m-d'))
        ->get_all();
}
    // Dashboard for Admin
    public function index() {
        $search_patient = isset($_POST['search_patient']) ? $_POST['search_patient'] : '';
        $search_service = isset($_POST['search_service']) ? $_POST['search_service'] : '';
        $search_status = isset($_POST['search_status']) ? $_POST['search_status'] : '';
    
        $data = [
            'appointments' => $this->Dental_uModel->getAppointments($search_patient, $search_service, $search_status),
            'search_patient' => $search_patient,
            'search_service' => $search_service,
            'search_status' => $search_status
        ];
    
        $this->call->view('admin/adminpage', $data);
    }
    

    // Dashboard view
    public function dashboard() {
        $this->call->view('admin/adminpage');
    }

    // Report view
    public function report() {
        $total_appointments = $this->Dental_uModel->getTotalAppointments();
        $total_users = $this->Dental_uModel->getTotalUsers();
        $monthly_patient_data = $this->Dental_uModel->getPatientsPerMonth();
        $service_patient_data = $this->Dental_uModel->getServicesChosen();
    
        $this->call->view('admin/report', [
            'total_appointments' => $total_appointments,
            'total_users' => $total_users,
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

        // Get appointment details before updating
        $appointment = $this->Dental_uModel->getAppointmentById($appointmentId);

        if ($this->Dental_uModel->updateAppointmentStatus($appointmentId, $status)) {
            // Send email notification
            $email_sent = $this->send_appointment_status_email(
                $appointment['email'],
                $appointment['fname'] . ' ' . $appointment['lname'],
                $status,
                $appointment['appointment_date'],
                $appointment['appointment_time']
            );

            $response = [
                'status' => 'success',
                'message' => 'Appointment status updated successfully!'
            ];
            if (!$email_sent) {
                $response['email_status'] = 'Email notification failed to send';
            }
            echo json_encode($response);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error updating appointment status.']);
        }
    }
}
    
public function send_appointment_status_email($email, $name, $status, $appointment_date, $appointment_time) {
    $this->call->library('email');

    // Format date and time for email
    $formatted_date = date('F d, Y', strtotime($appointment_date));
    $formatted_time = date('h:i A', strtotime($appointment_time));

    // Email content based on status
    switch($status) {
        case 'Done':
            $subject = 'Appointment Completed';
            $message = "Dear $name,\n\n"
                    . "Your dental appointment scheduled for $formatted_date at $formatted_time has been completed. "
                    . "Thank you for visiting Gayoso Dental Clinic!\n\n"
                    . "For any follow-up questions, please don't hesitate to contact us.\n\n"
                    . "Best regards,\n"
                    . "Gayoso Dental Clinic Team";
            break;

        case 'Postponed':
            $subject = 'Appointment Postponed';
            $message = "Dear $name,\n\n"
                    . "Your dental appointment scheduled for $formatted_date at $formatted_time has been postponed. "
                    . "We will contact you shortly to reschedule your appointment.\n\n"
                    . "We apologize for any inconvenience caused.\n\n"
                    . "Best regards,\n"
                    . "Gayoso Dental Clinic Team";
            break;

        case 'Follow Up':
            $subject = 'Follow-up Appointment Required';
            $message = "Dear $name,\n\n"
                    . "Regarding your dental appointment on $formatted_date at $formatted_time, "
                    . "we recommend scheduling a follow-up appointment.\n\n"
                    . "Please contact us to schedule your follow-up visit.\n\n"
                    . "Best regards,\n"
                    . "Gayoso Dental Clinic Team";
            break;

        case 'Cancelled':
            $subject = 'Appointment Cancelled';
            $message = "Dear $name,\n\n"
                    . "Your dental appointment scheduled for $formatted_date at $formatted_time has been cancelled. "
                    . "If you have any questions or would like to reschedule, please contact us.\n\n"
                    . "Best regards,\n"
                    . "Gayoso Dental Clinic Team";
            break;
    }

    $this->email->recipient($email);
    $this->email->subject($subject);
    $this->email->sender('dentalclinic@gmail.com', 'Gayoso Dental Clinic');
    $this->email->email_content($message, 'text');

    // Attempt to send the email and log any errors
    if (!$this->email->send()) {
        error_log("Email sending failed: " . $this->email->getError());
        return false;
    }
    return true;
}
public function cancelled_appointments() {
    // Add error logging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    try {
        $data['cancelled_appointments'] = $this->Dental_uModel->getCancelledAppointments();
        $this->call->view('admin/cancelled_appointments', $data);
    } catch (Exception $e) {
        error_log("Error in cancelled_appointments: " . $e->getMessage());
        echo "An error occurred: " . $e->getMessage();
    }
}
}
?>
