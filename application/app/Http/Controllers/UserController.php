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
		$this->data['js_assets'] 	= Assets::load('js', ['jquery']);
		$this->data['title']		= 'SayourShop | Login';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/login', array('data' => $this->data));
	}

	public function register_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap', 'bootstrap-responsive']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | Register';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/register', array('data' => $this->data));
	}

	public function forgot_pass_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap', 'bootstrap-responsive']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | Forgot Password';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/forgot_pass', array('data' => $this->data));
	}

	public function daftar()
	{
		$user = Sentinel::register([
    	'email'    => 'sendal@example.com',
    	'password' => '123456',
		]);
		Activation::create($user);
	    return redirect('login_form');
	}

	public function profile($id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap', 'bootstrap-responsive']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | My Profile';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/dashboard', array('data' => $this->data, 'id' => $id));
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
				echo "email/password salah";
			}else{
				$tes = Sentinel::validateCredentials($user, $credentials); //return boolean 1/0
				if ($tes == "") { //cek password
					echo "email/password salah";
				}else{
					$active = Activation::completed($user);
					if ($active == "") { //cek aktivasi
						echo "akun belum aktif";
					}else{
						Sentinel::login($user);
						return redirect('login_form');
					}	
				}	
			}
		}else{
			echo "ada form kosong";
		}
	}

	public function logout(Request $request)
	{
		Sentinel::logout();
		return redirect('login_form');
	}

}