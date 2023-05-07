<?php

use Stripe\Stripe;
use Stripe\Checkout\Session;
defined('BASEPATH') or exit('No direct script access allowed');

class StripeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(['form', 'url', 'file']);
		$this->load->library(['form_validation', 'session']);
		$this->load->model('Admin_Model');
		$this->load->database();
		$this->load->library('upload');

		$this->load->helper('download');


		force_download('/path/to/pdf.pdf', null);
	}

	const BASE_URL = 'https://api.stripe.com';
	const SECRET_KEY = 'sk_test_XXXXXXXXXXXXXXXXXXXXXXX';

	/**
	 * submit payment page
	 *
	 * @return void
	 */
	public function submit()
	{


		$user_id =   $this->session->userdata('user_id');
		// $this->dd($user_id);

		$input['transaction_id'] = "TRANSID-" . strtoupper(uniqid()); //Generates a random id every time.
		// $this->dd($input['transaction_id']);
		//echo "<pre>"; print_r( $input['transaction_id']);die();
		// save to database
		// it is recomended to save before sending data to stripe server
		// so we can verify after return from 3ds page
		// \DB::table('transactions')
		//     ->insert($input);

		// create payment method request
		// see documentation below for options
		// https://stripe.com/docs/api/payment_methods/create
		$payment_url = self::BASE_URL . '/v1/payment_methods';

		$payment_data = array(


			'type' => 'card',
			'card[number]' => 4242424242424242,
			'card[exp_month]' => 02,
			'card[exp_year]' => 2026,
			'card[cvc]' => 236,
			'billing_details[email]' => 'ric1408@gmail.com',
			'billing_details[address][city]' => 'Lucknow',
			'billing_details[address][state]' => 'UP',
			'billing_details[address][country]' => "IN",
			'billing_details[address][line1]' => "Vibhuti Khand",
			'billing_details[address][postal_code]' => "226010",
			'billing_details[name]' => "Raj",
			'billing_details[phone]' => "9140297101",

		);

		//  echo "<pre>"; print_r($payment_data);die();

		$payment_payload = http_build_query($payment_data);
		// echo "<pre>"; print_r($payment_payload);die();

		$payment_headers = [
			'Content-Type: application/x-www-form-urlencoded',
			'Authorization: Bearer ' . 'sk_test_51LvDQQSH9d7ofZNHlwFZQZWEhUBUZhHoAw1JO6Mu51YYceZYMUzAa7VgVacxD9v6y2s1np3MIEDoWVjzvb9miQTI00uBJkWB4Q'
		];

		// $this->dd($payment_headers);


		// sending curl request
		// see last function for code
		$payment_body = $this->curlPost($payment_url, $payment_payload, $payment_headers);
		// echo "<pre>"; print_r($payment_body);die();

		$payment_response = json_decode($payment_body, true);
		// echo "<pre>"; print_r($payment_response);die();
		// create payment intent request if payment method response contains id
		// see below documentation for options
		// https://stripe.com/docs/api/payment_intents/create
		// echo "<pre>"; print_r($payment_response);die();
		$cost = $this->user_model->fetchFinalCost($_SESSION['personal_data_id']);

		$input['amount'] = $cost['price'];
		$input['currency'] = 'INR';




		if (isset($payment_response['id']) && $payment_response['id'] != null) {
			$request_url = self::BASE_URL . '/v1/payment_intents';

			$request_data = array(
				'amount' => $input['amount'] * 100, // multiply amount with 100
				'currency' => $input['currency'],
				'payment_method_types[]' => 'card',
				'payment_method' => $payment_response['id'],

				'confirm' => 'true',
				'capture_method' => 'automatic',
				//'return_url' =>base_url('stripeResponse', $input['transaction_id']),
				'return_url' => base_url() . 'user/processPayment/' . $input['transaction_id'] . '/' . $user_id,
				'description' => 'Software development services',

				'payment_method_options[card][request_three_d_secure]' => 'automatic',
			);

			// echo "<pre>"; print_r($request_data);die();  
			$request_payload = http_build_query($request_data);

			$request_headers = [
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Bearer ' . 'sk_test_51LvDQQSH9d7ofZNHlwFZQZWEhUBUZhHoAw1JO6Mu51YYceZYMUzAa7VgVacxD9v6y2s1np3MIEDoWVjzvb9miQTI00uBJkWB4Q'
			];

			// another curl request
			// echo "<pre>";
			// print_r($request_payload);die;
			$response_body = $this->curlPost($request_url, $request_payload, $request_headers);
			// echo "<pre>"; print_r($response_body);die();
			$response_data = json_decode($response_body, true);
			echo "<pre>";
			print_r($response_data);
			die();
			// transaction required 3d secure redirect
			if (isset($response_data['next_action']['redirect_to_url']['url']) && $response_data['next_action']['redirect_to_url']['url'] != null) {
				$this->session->set_flashdata('success', "Payment success.");
				//redirect(base_url().'Admin/generate_pdf');
				//die($response_data['next_action']['redirect_to_url']['url']);
				redirect($response_data['next_action']['redirect_to_url']['url']);
				/* // transaction success without 3d secure redirect
            } elseif (isset($response_data['status']) && $response_data['status'] == 'succeeded') {
                return redirect()->route('stripeResponse', $input['transaction_id'])->with('success', 'Payment success.');

            // transaction declined because of error
            } elseif (isset($response_data['error']['message']) && $response_data['error']['message'] != null) {
                return redirect()->route('stripeResponse', $input['transaction_id'])->with('error', $response_data['error']['message']);
            } */
			} else {
				$this->session->set_flashdata('error', "Unable to make transaction");
				// die("here");
				redirect(base_url() . 'user/payment', 'refresh');
			}
			// error in creating payment method
			/* } elseif (isset($payment_response['error']['message']) && $payment_response['error']['message'] != null) {
            return redirect()->route('stripeResponse', $input['transaction_id'])->with('error', $payment_response['error']['message']);
        } */
		}
	}
	private function curlPost($url, $data, $headers)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$response = curl_exec($ch);

		curl_close($ch);

		return $response;
	}


	public function handlePayment()
	{
		require_once('application/libraries/stripe-php/init.php');

		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

		/*  \Stripe\PaymentIntent::create([
            "amount" => 100 * 120,
            "currency" => "usd",
            "source" => $this->input->post('stripeToken'),
            "description" => "Dummy stripe payment."
        ]); */

		// $this->stripeService->setApiKey($this->apiKey);

		/* $payment_data = array(


            'type' => 'card',
            'card[number]' => 4242424242424242,
            'card[exp_month]' => 02,
            'card[exp_year]' => 2026,
            'card[cvc]' => 236,
            'billing_details[email]' => 'ric1408@gmail.com',
            'billing_details[address][city]' => 'Lucknow',
            'billing_details[address][state]' => 'UP',
            'billing_details[address][country]' => "IN",
            'billing_details[address][line1]' => "Vibhuti Khand",
            'billing_details[address][postal_code]' => "226010",
            'billing_details[name]' => "Raj",
            'billing_details[phone]' => "9140297101",

        ); */
		$amount = 100;
		/*  $customerDetailsArray["country"] ='RON';
        $notes = 'payment';
        $customerDetailsArray["postalCode"] ='226010';
        $customerDetailsArray["name"] ='ric';
        $customerDetailsArray["address"] ='vibhuti khand'; */
		$paymentIntent = \Stripe\PaymentIntent::create([
			'description' => 'Rails Stripe transaction',
			'shipping' => [
				'name' => "ric",
				'address' => [
					'line1' => 'vibhuti khand',
					'postal_code' => '223020',
					'country' => 'USD'
				]
			],
			'amount' => $amount * 100,
			'currency' => 'RON',
			'payment_method_types' => [
				'card'
			],
		]);
		echo "<pre>";
		print_r($paymentIntent);
		die;


		$this->session->set_flashdata('success', 'Payment has been successful.');

		redirect('/make-stripe-payment', 'refresh');
	}

	public function checkoutSession()
    {
        // $this->dd($this->session->userData());
		$price = $this->input->post('price');
		$email = $this->session->userData('email');
        header('Content-Type: application/json');
        Stripe::setApiKey($this->config->item('stripe_secret'));

        

        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email'       => $email,
            'line_items'=>[[
                'price_data'=>[
                    'currency'=>'inr',
                    'product_data'=>[
                        'name'=>'Credits',
                    ],
                    'unit_amount'=>$price*100
                        ],
                'quantity'=>1,
            ]],
            'client_reference_id'  => '1234',
            'mode'                 => 'payment',
            'success_url'          => base_url('processPayment').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => base_url('failed-payment?error=payment_cancelled'),
        ]);

        //returns session id
        echo json_encode(['id' => $session->id]);
    }
}
