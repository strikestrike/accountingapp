<?php
date_default_timezone_set('Asia/Kolkata');
defined('BASEPATH') or exit('No direct script access allowed');

class Googlelogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		require_once APPPATH . 'third_party/src/Google_Client.php';
		require_once APPPATH . 'third_party/src/contrib/Google_Oauth2Service.php';
	}

	public function index()
	{
		$this->load->view('user/login');
	}

	public function login()
	{
		$clientId = '472764310478-fcu8ajfj3kang4v7omih4egsb5f0vjaq.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = 'http://localhost/Accounting-App-php/googlelogin/login';

		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);

		$google_oauthV2 = new Google_Oauth2Service($gClient);



		if (isset($_GET['code'])) 
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}

		if ($gClient->getAccessToken()) 
		{
			$userProfile = $google_oauthV2->userinfo->get();
			// echo "<pre>";
			// print_r($userProfile);

			/**
			 * check whether the user is already registered or not
			 */
			$registeredUser = $this->user_model->getUserDetailsByEmail($userProfile['email']);

			// $this->dd($registeredUser);

			if($registeredUser == false)
			{
				$updata['user_id'] = $userProfile['id'];
				$updata['first_name'] = $userProfile['given_name'];
				$updata['last_name'] = $userProfile['family_name'];
				$updata['user_name'] = $updata['first_name'] . " " . $updata['last_name'];
				$updata['email'] = $userProfile['email'];
				$updata['created_at'] = date('Y-m-d H:i:s');	

				if ($this->admin_model->createUser($updata)) 
				{
					$userData = $this->user_model->get_user_login_detail_by_email($updata['email']);
					$this->session->set_userdata($userData);
					echo "<script>window.location.href='" . base_url('user/dashboard') . "';</script>";
					die;
				}
			}
			else
			{
				// echo "registered";
				// $this->dd($registeredUser);

				$updata['user_id'] = $registeredUser['user_id'];
				$updata['first_name'] = $userProfile['given_name'];
				$updata['last_name'] = $userProfile['family_name'];
				$updata['user_name'] = $updata['first_name'] . " " . $updata['last_name'];
				$updata['email'] = $userProfile['email'];

				if ($this->user_model->updateUserProfile($updata['user_id'], $updata)) 
				{
					$userData = $this->user_model->get_user_login_detail_by_email($updata['email']);
					$this->session->set_userdata($userData);
					// $this->dd($this->session->userdata());
					echo "<script>window.location.href='" . base_url('user/dashboard') . "';</script>";
					die;
				}
				else{
					
				}
			}

		}

		/* if($this->google_login_model->Is_already_register($data['id']))
            {
                $user_data = array(

                    'email' => $data['email'],
                    'password' => $data['password'],
                );
                     $this->google_login_model->Update_user_data($user_data, $data['id']);

            }

            else
            {
                //insert data
                $user_data = array(
                    'login_oauth_uid' => $data['id'],
                    'email'  => $data['email'],
                    'password' => $data['password'],

                );
                $this->google_login_model->Insert_user_data($user_data);
            }
            $this->session->set_userdata('user_data', $user_data);

            } */ 
			else {
			$url = $gClient->createAuthUrl();
			header("Location: $url");
			exit;
		}
	}

}
