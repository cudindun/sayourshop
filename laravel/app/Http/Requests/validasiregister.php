<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validasiregister extends Request
{


public function authorize()
	{
		return true;
	}

public function rules()
	{
		'username'=>'email|required',
		'password'=>'required'
	}

public function messages()
	{
		return [
		'username.required'=>'harus mengisi email',
		'username.email'=>'format bukan email',
		'password.required'=>'harus mengisi password',
		];
	}
}