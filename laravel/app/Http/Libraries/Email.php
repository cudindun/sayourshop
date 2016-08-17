<?php namespace App\Http\Libraries;

use App\Http\Models\Option;
use App\Http\Models\Product;
use App\Http\Models\OrderDetail;

class Email {
	
	/*--------------------------------------------------------------------------------------------------------------
	@params
	string $from_name 'Nama Pengirim'
	string $from 'email@example.com'
	string $to 'email@example.com'
	string $subject 'Subject Email'
	string $body '<html></html>'
	---------------------------------------------------------------------------------------------------------------*/
	public function send($from_name,$from,$to,$subject,$body,$sender='') { 
		
		require_once 'Email/PHPMailerAutoload.php';
		$mail = new \PHPMailer();
		$mail->IsSMTP();
		
		/* OFFLINE */
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.mandrillapp.com';
		$mail->Username = 'bintoroian@gmail.com';
		$mail->Password = 'FJ8CI6titI6oIobb_ErXjg';
		$mail->Port = 587;

		/* ONLINE 
		$mail->SMTPAuth = true; 
		switch ($sender) {
		default:
		$mail->Host = 'host.cakning.com';
		$mail->Username = 'info@cakning.com';  
		$mail->Password = 'gendut80';
		break;
		case '1':
		$mail->Host = 'host.cakning.com';
		$mail->Username = 'pesan@cakning.com';  
		$mail->Password = 'gendut80';
		break;
		}
		*/

		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->IsHTML(true);
		$mail->AddAddress($to);
		if(!$mail->Send()) {
			return false;
			die();
		} else {
			return true;
		}
	}

	/*-----------------------------------------------------------------------------------------------
	@params $email_and_content = array(string email_seller => array(object order_detail, object order_detail))
	-----------------------------------------------------------------------------------------------*/
	public function confimationProductSold($email_and_content)
	{
		$from_name = 'Covanti';
		$admin_email = Option::where('meta_key', '=', 'admin_email')->first();
		$logo = Option::where('meta_key', '=', 'logo')->first();
		$from = $admin_email->meta_value;
		$subject = 'Konfirmasi Produk Terjual';
		
		foreach ($email_and_content as $email_seller => $order_details) {
			$to = $email_seller;
			foreach ($order_details as $key => $order_detail) {
				$product = Product::find($order_detail->product_id);
				$order_details[$key]->product_name = $product->name;
			}
			$data = array(
					'order_details' => $order_details,
					'logo'          => $logo->meta_value
				);
			$body = view('emails/confirmation_product_sold', $data);
			$this->send($from_name,$from,$to,$subject,$body);
		}
	}

	/*-----------------------------------------------------------------------------------------------
	@params
	array $parrams array(
		'email_buyer' 	=> string 'email@example.com'
		'order_code'	=> string 'INV/2016/12/31/1',
		'courier'		=> string 'JNE',
		'no_resi'		=> string 'SUBM123456789',
		'penerima'		=> string 'IAN',
		'delivery_date' => string '2016-12-31'
	)
	-----------------------------------------------------------------------------------------------*/
	public function confirmationProductDelivered($params)
	{
		$from_name = 'Covanti';
		$admin_email = Option::where('meta_key', '=', 'admin_email')->first();
		$from = $admin_email->meta_value;
		$to = $params['email_buyer'];
		$subject = 'Konfirmasi Pengiriman Produk';
		$body = view('emails/confirmation_product_delivered', $params);
		$this->send($from_name,$from,$to,$subject,$body);
	}

	public function confirm_payment($data)
	{
		$from_name = 'Covanti';
		$admin_email = Option::where('meta_key', '=', 'admin_email')->first();
		$from = $admin_email->meta_value;
		$to = $data['email'];
		$subject = 'Konfirmasi Pembayaran';
		$data = $data;
		$body = view('emails/confirm_payment',$data);		
		$this->send($from_name,$from,$to,$subject,$body);
	}

	public function confirm_payment_admin($data)
	{
		$from_name = 'Covanti';
		$admin_email = Option::where('meta_key', '=', 'admin_email')->first();
		$from = $admin_email->meta_value;
		$to = $admin_email->meta_value;
		$subject = 'Konfirmasi Pembayaran';
		$data = $data;
		$body = view('emails/confirmpaymentadmin',$data);		
		$this->send($from_name,$from,$to,$subject,$body);

	}

	public function sendEmailAdmin($data)
	{
		$from_name = 'Covanti';
		$admin_email = Option::where('meta_key', '=', 'admin_email')->first();
		$from = $admin_email->meta_value;
		$to = $admin_email->meta_value;
		$subject = 'Pesan dari Kontak Kami';
		$data = $data;
		$body = view('emails/contactus',$data);		
		$this->send($from_name,$from,$to,$subject,$body);
	}
}