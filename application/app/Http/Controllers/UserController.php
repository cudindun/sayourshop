<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\User;
use App\Http\Models\Activations;
use DB, Sentinel, Validator, Activation;

class UserController extends Controller
{
    public function login_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | Login';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/login', array('data' => $this->data));
	}

	public function register_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery']);
		$this->data['title']		= 'SayourShop | Register';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/register', array('data' => $this->data));
	}

	public function forgot_pass_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | Forgot Password';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/forgot_pass', array('data' => $this->data));
	}

	public function register(Request $request)
	{
		$rules = array(
			'email_input' => 'required|email',
			'pass_input' => 'required',
			're_pass_input' => 'required',
			'first_name_input' => 'required',
			'last_name_input' => 'required',
			'phone_input' => 'required' 
			);
		$validator 	= Validator::make($request->all(), $rules);
		if (!$validator->fails()) {	//cek input form
			$pass = $request->pass_input;
			$re_pass = $request->re_pass_input;
			$permissions = array('user.update' => false );
			$user = array (
		    	'email'    => $request->email_input,
		    	'password' => $pass,
		    	'first_name' => $request->first_name_input,
		    	'last_name' => $request->last_name_input,
		    	'phone' => $request->phone_input,
		    	'status' => '1',
		    	'permissions' => $permissions
				);
			if ($pass == $re_pass) {
				if ( is_null(Sentinel::findByCredentials($user)) ) { //cek email
					$register = Sentinel::register($user);
					$new_member = User::find($register->id);
					$new_member->phone = $request->phone_input;
					$new_member->status = '1';
					$new_member->save();
					Activation::create($register);
					return redirect('login_form')->with('success','Pendaftaran berhasil kode aktivasi akun telah dikirimkan. Silahkan cek email Anda');
				}else{
					return redirect('daftar')->with('error','Maaf email Anda sudah terdaftar');
				}
			}else{
				return redirect('daftar')->with('error', 'Password tidak cocok');
			}
		}else{
			return redirect('daftar')->with('error','Silahkan isi semua form');
		}
	}

	public function dashboard($id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);

		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | My Profile';
		$this->data['user']			= Sentinel::getUser();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/dashboard', array('data' => $this->data));
	}

	public function login(Request $request)
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required' 
			);
		$validator 	= Validator::make($request->all(), $rules);
		if (!$validator->fails()) {	//cek input form
			$credentials = array(
			        'email'    		=> $request->email,
		  	   		'password' 		=> $request->password
			    );
			$user = Sentinel::findByCredentials($credentials); //return data" user
			if ($user == "") { //cek akun
				return redirect('login_form')->with('error','Email/Password Anda salah');
			}else{
				$tes = Sentinel::validateCredentials($user, $credentials); //return boolean 1/0
				if ($tes == "") { //cek password
					return redirect('login_form')->with('error','Email/Password Anda salah');
				}else{
					$active = Activation::completed($user);
					if ($active == "") { //cek aktivasi
						return redirect('login_form')->with('error','Akun Anda belum diaktivasi/aktivasi sudah tidak berlaku .Silahkan cek email Anda atau kirim ulang kode aktivasi');
					}else{
						Sentinel::login($user);
						return redirect('/');
					}	
				}	
			}
		}else{
			return redirect('login_form')->with('error','Silahkan isi form yang tersedia');
		}
	}

	public function logout(Request $request)
	{
		Sentinel::logout();
		return redirect('login_form')->with('success','Anda telah logout');
	}

}