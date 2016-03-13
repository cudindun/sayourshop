<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\User;
use App\Http\Models\UserMeta;
use App\Http\Models\Activations;
use DB, Sentinel, Validator, Activation, Storage, Input, Session, Redirect, File;

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

	public function change_pass_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | Ubah Password';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/change_pass', array('data' => $this->data));
	}

	public function change_pass(Request $request){
		$rules = array(
			'password' => 'required',
			'new_pass' => 'required',
			're_new_pass' => 'required' 
			);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = Sentinel::getUser();
			if (password_verify($request->password ,$user->password)) {
				if ($request->new_pass == $request->re_new_pass) {
					$user = Sentinel::update($user, ['password' => $request->new_pass]);
					return redirect('form_ubah_pass')->with('success', 'Password berhasil diubah');
				}else{
					return redirect('form_ubah_pass')->with('error','Password tidak cocok');	
				}
			}else{
				return redirect('form_ubah_pass')->with('error','Password lama tidak cocok');
			}
		}else{
			return redirect('form_ubah_pass')->with('error', 'Terdapat form kosong');
		}
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

	public function dashboard()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);

		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'SayourShop | My Profile';
		$this->data['user']			= Sentinel::getUser();
		$this->data['rekening']		= UserMeta::where('user_id', $this->data['user']->id)->first();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'user/dashboard', array('data' => $this->data));
	}

	public function upload(Request $request) {
	  // getting all of the post data
		$id = Sentinel::getUser();
	  	$file = array('image' => Input::file('image'));
	  	$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
	  	$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
	    	return redirect('dashboard')->with('failed','Upload Gagal');
	  	}
	  	else {
		    if (Input::file('image')->isValid()) {
		    	File::delete('photo_profile/'.$id->image);//hapus foto lama
				$destinationPath = 'photo_profile'; // upload path
		        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = $id->id.'.'.$extension; // renameing image
				//insert DB
				$id->image = $fileName;
				$id->save(); 
		    	//end insert
		    	Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			    return redirect('dashboard')->with('completed','Upload berhasil');
			}
			else {
		    	return redirect('dashboard')->with('failed','Upload Gagal');
		    }
		}
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

	public function update(Request $request)
	{
		$rules = array(
			'first_name_input' => 'required',
			'last_name_input' => 'required',
			'phone_input' => 'required'
			);
		$validator 	= Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = Sentinel::getUser();
			$user->first_name = $request->first_name_input;
			$user->last_name = $request->last_name_input;
			$user->phone = $request->phone_input;
			$user->save();
			return redirect('dashboard')->with('success','profil berhasil diperbaharui');
		}else
			return redirect('dashboard')->with('error','maaf ada form yang kosong');

	}


	public function logout(Request $request)
	{
		Sentinel::logout();
		return redirect('login_form')->with('success','Anda telah logout');
	}

	public function add_bank_acc(Request $request)
	{
		$rules = array(
			'bank' => 'required',
			'bank_account' => 'required',
			'account_name' => 'required'
			);
		$validator 	= Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$rekening = [
				'bank' => $request->bank,
				'nomor_rekening' => $request->bank_account,
				'atas_nama' => $request->account_name
				];

			if ($user_meta = UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','bank_account')->first()) {
				$unserialize = unserialize($user_meta->meta_value);
				$account = array($unserialize);// membuat indeks array
				$sum_array = array_push($account, $rekening);
				$serialize = serialize($account);
				$total = UserMeta::where('user_id', $user_meta->user_id)->where('meta_key','bank_account')->update(['meta_value' => $serialize]);
				return redirect('dashboard')->with('add','Nomor rekening berhasil ditambahkan');
			}else{
				$usermeta = new UserMeta;
				$usermeta->user_id = Sentinel::getUser()->id;
				$usermeta->meta_key = "bank_account";
				$usermeta->meta_value = $rekening;
				$usermeta->save();
				return redirect('dashboard')->with('add','Nomor rekening berhasil ditambahkan');
			}
		}else{
			return redirect('dashboard')->with('fail','Nomor rekening gagal ditambahkan');
		}
	}
}