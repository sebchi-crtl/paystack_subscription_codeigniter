<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paystack extends Admin_Controller {
    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->data['page_title'] = 'Paystack';
		$this->load->model('model_paystack');
	}

    public function index(){
        $saved = "fans";
        echo '<pre>'; print_r($saved); echo '</pre>';
    }
    public function blueburries()
	{
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/subscription",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        // $curl = curl_init();
          
        //   curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.paystack.co/plan/104291",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //       "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
        //       "Cache-Control: no-cache",
        //     ),
        //   ));
          
        //   $response = curl_exec($curl);
        //   $err = curl_error($curl);
        //   curl_close($curl);
          
        //   if ($err) {
        //     echo "cURL Error #:" . $err;
        //   } else {
        //     echo $response;
        //   }
    }
    
	public function blueburry()
	{
        
        // $url = "https://api.paystack.co/plan";
        // $fields = [
        //     'name' => "Monthly retainer",
        //     'interval' => "monthly", 
        //     'amount' => "500000"
        // ];
        // $fields_string = http_build_query($fields);
        // //open connection
        // $ch = curl_init();
        
        // //set the url, number of POST vars, POST data
        // curl_setopt($ch,CURLOPT_URL, $url);
        // curl_setopt($ch,CURLOPT_POST, true);
        // curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
        //     "Cache-Control: no-cache",
        // ));
        
        // //So that curl_exec returns the contents of the cURL; rather than echoing it
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        // //execute post
        // $result = curl_exec($ch);
        // echo $result;
         return redirect('https://paystack.com/pay/burry-plan');
        
    }

    public function blueburrt()
    {
        $url = "https://api.paystack.co/subscription";
        $fields = [
          'customer' => "CUS_kdbgsxj7ekjjmcz",
          'plan' => "PLN_wx0qghhl1ff9zh1"
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
          "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        echo $result;
    }

    public function blueburryRedirect()
    {
        // $paymentDetails = Paystack::getPaymentData();
        // dd($paymentDetails);

        // $curl = curl_init();
        
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.paystack.co/transaction",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //     "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
        //     "Cache-Control: no-cache",
        //     ),
        // ));
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);
        
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo '<pre>'; print_r($response); echo '</pre>';
        // }
        echo "enter";
        
        $name = $_GET['reference'];
        echo $name; 
        $get_data = request('GET', 'https://api.paystack.co/subscription/SUB_bfowdhribddzngj/'['reference']['customer_id'], false);
        echo $get_data;
    }

    public function blueburryRedirects()
    {
        $ref = $_GET['reference'];
        echo $ref;
        // // $paymentDetails = Paystack::getPaymentData();
        // // dd($paymentDetails);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data['customer']  = json_decode($response,true);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            
            echo '<pre>'; print_r($data['customer']); echo '</pre>';
        }
    }

    public function blueberySubscripeRedirect()
    {
        $ref = $_GET['reference'];
        echo $ref;
     
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_df86e61fd0777c9df0039d715d878389e35462bb",
            "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data  = json_decode($response,true);
            $data = $data['data'];
            $saved = [];
            $saved['last_name'] = $data['customer']['last_name'];
            $saved['first_name'] = $data['customer']['first_name'];
            $saved['email'] = $data['customer']['email'];
            $saved['company_code'] = $data['metadata']['custom_fields']['1']['value'];
            $saved['dob'] = $data['metadata']['custom_fields']['0']['value'];
            $saved['amount_paid'] = $data['amount']/100; //convert back to naira
            $saved['reference'] = $data['reference'];
            $saved['ip_address'] = $data['ip_address'];
            $saved['customer_code'] = $data['customer']['customer_code'];
            $saved['plan'] = $data['plan_object']['name']; 
            $saved['channel'] = $data['channel'];
            $saved['status'] = $data['status'];
            $saved['paid_at'] = $data['paid_at'];
            // echo '<pre>'; print_r($saved); echo '</pre>';
            $result=$this->model_paystack->custom($saved);
            if ($result>0){
                echo "Records Saved Successfully";
                $this->load->view('paystack');
            }
        }
        
    }



}