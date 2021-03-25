<?php 

class Model_paystack extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    public function custom($saved){

		// $result = "INSERT INTO payments (payments_id,last_name,first_name,email,company_code,dob,amount_paid,reference,ip_address,customer_code,plan,channel,status,paid_at) 
        // VALUES ('','$last_name','$first_name','$email','$fields','$field','$amount_paid','$reference','$address','$customer_code','$plan','$channel','$status','$paid_at')";
        // $this->db->query($result);
        
        $result = $this->db->insert('payments', $saved);
        return true;
        
        
    }
}
