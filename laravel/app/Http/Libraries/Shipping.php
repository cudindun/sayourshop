<?php namespace App\Http\Libraries;

class Shipping
{
	public static function check_resi($no_resi)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://pro.rajaongkir.com/api/waybill",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "waybill=".$no_resi."&courier=jne",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: d780c55f5ceb80dbdf9d595b65b9ad68"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}
	