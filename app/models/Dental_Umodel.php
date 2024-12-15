<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Dental_umodel extends Model {
    // Creating a message
    public function create_mess($fullname, $email, $contact_number, $concern) {
        $data = array(
            'name' => $fullname,
            'email' => $email,
            'contact' => $contact_number,
            'message' => $concern
        );
        return $this->db->table('messages')->insert($data);
    }
    
    // Fetching all services
    public function get_all_services() {
        return $this->db->table('services')->select('service_id, service_name')->get_all();
    }

    // Making an appointment
    public function makeAppoint($data) {
        try {
            return $this->db->table('appoint')->insert($data);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Fetching all appointments
    public function getAllAppointments() {
        return $this->db->table('appoint')
            ->select('appoint.appoint_id, appoint.fname, appoint.lname, appoint.appointData, services.service_name, appoint.status')
            ->join('services', 'appoint.service_id = services.service_id')
            ->get_all();
    }

    // Update the appointment status
    // Update the appointment status
    public function updateAppointmentStatus($appointmentId, $status) {
        $data = array('status' => $status);
        $result = $this->db->table('appoint')
            ->where('appoint_id', $appointmentId)
            ->update($data);
    
        // Check if the update was successful
        if ($result) {
            return true;
        } else {
            // Log the SQL error for debugging
            error_log("SQL Error: " . $this->db->getLastError());
            return false;
        }
    }

    public function getAllUsers() {
        return $this->db->table('users')
            ->select('users.id, users.first_name, users.email,users.role') // Corrected column name
            ->get_all();
    }

    public function getALlMessage(){
        return $this->db->table('messages')->get_all();
    }
    

    public function getAppointments($search_patient, $search_service, $search_status) {
        $query = $this->db->table('appoint')
            ->select('appoint.appoint_id, appoint.fname, appoint.lname, 
                     appoint.email, appoint.appointment_date, 
                     appoint.appointment_time, services.service_name, 
                     appoint.status')
            ->join('services', 'appoint.service_id = services.service_id');
    
        if ($search_patient) {
            $query->like('appoint.fname', $search_patient)
                  ->or_like('appoint.lname', $search_patient);
        }
        
        if ($search_service) {
            $query->like('services.service_name', $search_service);
        }
    
        if ($search_status) {
            $query->like('appoint.status', $search_status);
        }
    
        return $query->get_all();
    }

    public function getPatientsPerMonth() {
        return $this->db->table('appoint')
            ->select('MONTH(appointment_date) as month, COUNT(*) as total_patients')
            ->group_by('MONTH(appointment_date)')
            ->get_all();
    }
    
    
    public function getServicesChosen() {
        return $this->db->table('appoint')
            ->select('services.service_name, COUNT(appoint.service_id) as total_patients')
            ->join('services', 'appoint.service_id = services.service_id')
            ->group_by('appoint.service_id')
            ->get_all();
    }
    
    public function getTreatmentSuggestions($symptoms) {
        $treatmentSuggestions = [
            "toothache" => "Over-the-counter pain relievers, saltwater rinse.",
            "bleeding_gums" => "Saltwater rinse, maintain good oral hygiene.",
            "bad_breath" => "Regular brushing, flossing, and mouthwash.",
            "sensitive_teeth" => "Desensitizing toothpaste, avoid acidic foods.",
            "swollen_gums" => "Warm saltwater rinse, over-the-counter pain relief.",
            "jaw_pain" => "Cold compress, pain relievers, jaw exercises.",
        ];
        
        $suggestions = [];
        foreach ($symptoms as $symptom) {
            if (array_key_exists($symptom, $treatmentSuggestions)) {
                $suggestions[] = $treatmentSuggestions[$symptom];
            }
        }

        return $suggestions;
    }

    public function generatePrescription($symptoms, $duration, $previousVisit) {
        $prescription = "";
        if (count($symptoms) > 0) {
            if ($duration == "more_than_1_month" || $previousVisit == "no") {
                $prescription = "Please visit us for a thorough examination. Our clinic is located at Gozar Street, Barangay Camilmil, Calapan City Oriental Mindoro, 5200";
            } else {
                $suggestions = $this->getTreatmentSuggestions($symptoms);
                $prescription = "Based on your symptoms, here are suggested treatments: <ul>";
                foreach ($suggestions as $suggestion) {
                    $prescription .= "<li>" . htmlspecialchars($suggestion) . "</li>";
                }
                $prescription .= "</ul>";
            }
        }
        return $prescription;
    }

    public function getCurrentUser($user_id) {
        return $this->db->table('users')
            ->where('id', $user_id)
            ->get();
    }

    // Updating user data
    public function updateUser($user_id, $data) {
        return $this->db->table('users')
            ->where('id', $user_id)
            ->update($data);
    }
    public function getUserAppointments($user_id) {
        return $this->db->table('appoint')
            ->select('appoint.*, services.service_name')
            ->join('services', 'appoint.service_id = services.service_id')
            ->where('appoint.user_id', $user_id)
            ->get_all();
    }
    
    public function getAppointmentCountForDate($date) {
        return $this->db->table('appoint')
            ->where('appointment_date', $date)
            ->select_count('appoint_id', 'count')
            ->get()['count'];
    }
    public function getAppointmentById($id) {
        return $this->db->table('appoint')
            ->where('appoint_id', $id)
            ->get();
    }
    public function getTotalUsers() {
        $users = $this->db->table('users')->get_all();
        return count($users);
    }
    
    // Rename existing getTotalPatients to getTotalAppointments for clarity
    public function getTotalAppointments() {
        $appointments = $this->db->table('appoint')->get_all();
        return count($appointments);
    }
    public function isTimeSlotAvailable($appointment_date, $appointment_time) {
        $existing = $this->db->table('appoint')
            ->where('appointment_date', $appointment_date)
            ->where('appointment_time', $appointment_time)
            ->get();
    
        return empty($existing); // Return true if no existing record is found
    }
    public function deleteAppointment($appoint_id, $user_id) {
        return $this->db->table('appoint')
            ->where('appoint_id', $appoint_id)
            ->where('user_id', $user_id)
            ->delete();
    }
    public function insertCancelledAppointment($data) {
        return $this->db->table('cancelled_appointments')->insert($data);
    }
    public function getCancelledAppointments() {
        try {
            $result = $this->db->table('cancelled_appointments')
                ->select('cancelled_appointments.*, services.service_name')
                ->join('services', 'cancelled_appointments.service_id = services.service_id')
                ->order_by('cancelled_at', 'DESC')
                ->get_all();
            
            if ($result === false) {
                error_log("Database error in getCancelledAppointments: " . $this->db->error());
            }
            
            return $result;
        } catch (Exception $e) {
            error_log("Error in getCancelledAppointments: " . $e->getMessage());
            return array();
        }
    }
}
?>
