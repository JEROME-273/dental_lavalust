<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Dental_uModel extends Model {
    public function create_mess($fullname,$email,$contact_number,$concern){
        $data = array(
            'name' => $fullname,
            'email'=> $email,
            'contact'=>$contact_number,
            'message'=>$concern
        );
        return $this->db->table('messages')->insert($data);
    }
    
    //sa pag show ng mga services
    public function get_all_services() {
        return $this->db->table('services')->select('service_id, service_name')->get_all();
    }
    
    public function get_booked_dates() {
        $query = $this->db->query("SELECT appointment_date, COUNT(*) as count FROM appointments GROUP BY DATE(appointment_date)");
        $dates = $query->result_array();
        $bookedDates = [];
        foreach ($dates as $date) {
            if ($date['count'] >= 3) {
                $bookedDates[] = $date['appointment_date'];
            }
        }
        return $bookedDates;
    }

    public function check_appointment_count($date) {
        $query = $this->db->query("SELECT COUNT(*) as count FROM appointments WHERE DATE(appointment_date) = DATE(?)", [$date]);
        return $query->row_array()['count'];
    }

    public function book_appointment($patientData, $appointmentData) {
        $this->db->transaction_start();
        
        $this->db->table('patients')->insert($patientData);
        $patientId = $this->db->insert_id();
        
        $appointmentData['patient_id'] = $patientId;
        $this->db->table('appointments')->insert($appointmentData);
        
        $this->db->transaction_complete();
    }
}


?>