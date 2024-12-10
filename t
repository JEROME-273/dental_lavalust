<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AppointmentModel extends Model {
    
    public function get_services() {
        return $this->db->table('services')->get();
    }

    public function get_booked_dates() {
        $query = $this->db->query("SELECT appointment_date, COUNT(*) as count FROM appointments GROUP BY DATE(appointment_date) HAVING count >= 3");
        $results = $query->result();
        return array_column($results, 'appointment_date');
    }

    public function get_appointment_count($date) {
        $query = $this->db->table('appointments')
                          ->where('DATE(appointment_date)', date('Y-m-d', strtotime($date)))
                          ->count_all_results();
        return $query;
    }

    public function insert_patient($firstName, $lastName, $email, $phone) {
        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone
        ];
        $this->db->table('patients')->insert($data);
        return $this->db->insert_id();
    }

    public function insert_appointment($patientId, $appointmentDate, $serviceId) {
        $data = [
            'patient_id' => $patientId,
            'appointment_date' => $appointmentDate,
            'service_id' => $serviceId
        ];
        $this->db->table('appointments')->insert($data);
    }
}