<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Display Log Files.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Logs 
{

	function getUserIpAddr(){
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				//ip from share internet
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
				//ip pass from proxy
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

	function log_login($id){
		$id = $id;
		$description = "Login Aplikasi SangData dari IP : ".$this->getUserIpAddr();
		$activity = "-";
		$type = 1;
		$point = 10;
		$application_id = 22;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://103.124.44.227/api/basic/ppid/activity_user",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "user_id=$id&description=$description&activity_id=$activity&type=$type&point=$point&application_id=$application_id",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
		));

		$response = curl_exec($curl);
		return $response;
		// curl_close($curl);
		// echo $response;
	}

	function log_logout($id){
		$id = $id;
		$description = "Logout Aplikasi SangData dari IP : ".$this->getUserIpAddr();
		$activity = "-";
		$type = 0;
		$point = 1;
		$application_id = 22;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://103.124.44.227/api/basic/ppid/activity_user",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "user_id=$id&description=$description&activity_id=$activity&type=$type&point=$point&application_id=$application_id",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
		));

		$response = curl_exec($curl);
		return $response;
		// curl_close($curl);
		// echo $response;
	}

	function log_update($id){
		$id = $id;
		$description = "Update Aplikasi SangData dari IP : ".$this->getUserIpAddr();
		$activity = "-";
		$type = 8;
		$point = 9;
		$application_id = 22;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://103.124.44.227/api/basic/ppid/activity_user",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "user_id=$id&description=$description&activity_id=$activity&type=$type&point=$point&application_id=$application_id",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
		));

		$response = curl_exec($curl);
		return $response;
		// curl_close($curl);
		// echo $response;
	}


	

}
