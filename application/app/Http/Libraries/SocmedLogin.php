<?php namespace App\Http\Libraries;
use Sentry;
use App\Http\Models\User;
use Socialite;
use App\Http\Models\UserMeta;
use Mail;
/**
* 
*/
class SocmedLogin
{

	public static function redirectToProvider($socmed)
    {
        return Socialite::driver($socmed)->redirect();
    }

    public static function handleProviderCall($socmed)
    {
        $user = Socialite::driver($socmed)->user();
        $check = UserMeta::where('meta_key', $socmed . "_id")
    					->where('meta_value', $user->getId())
    					->first();
        if($check){
	        $registerUser = Sentry::findUserById($check->user_id);
		} else {
			try {
				switch($socmed){
						case "twitter":
								$registerUser = Sentry::register([
								    		'first_name' 	=> $user->getName(),
								    		'last_name'		=> $user->getNickname(),
								    		'email'			=> $user->getNickname() . "@twitter.com",
								    		'password'		=> str_random(7)
							    			], true);
								$registerUser->getResetPasswordCode();
								$getUser = User::find($registerUser->id);
							    $getUser->permissions = '{"akses":"member"}';
							    $getUser->id_type=$socmed;
							    $getUser->save();
						break;
						case "facebook":
								$registerUser = Sentry::register([
								    		'first_name' 	=> $user->getName(),
								    		'last_name'		=> $user->getNickname(),
								    		'email'			=> $user->getEmail(),
								    		'password'		=> str_random(7)
							    			], true);
								$registerUser->getResetPasswordCode();
								$registerUser->getResetPasswordCode();
								$getUser = User::find($registerUser->id);
							    $getUser->permissions = '{"akses":"member"}';
							    $getUser->id_type=$socmed;
							    $getUser->save();
						break;
						case "google":
								$registerUser = Sentry::register([
								    		'first_name' 	=> $user->getName(),
								    		'last_name'		=> $user->getNickname(),
								    		'email'			=> $user->getEmail(),
								    		'password'		=> str_random(7)
							    			], true);
								$registerUser->getResetPasswordCode();
								$registerUser->getResetPasswordCode();
								$getUser = User::find($registerUser->id);
							    $getUser->permissions = '{"akses":"member"}';
							    $getUser->id_type=$socmed;
							    $getUser->save();
						break;
				}
			} catch (\Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    $registerUser = Sentry::findUserByLogin($user->getEmail());
			    $registerUser->activated = 1;
			    $registerUser->save();
				$getUser = User::find($registerUser->id);
			}
			// } catch(\Exception $e){
			// 	$registerUser = Sentry::findUserByLogin($user->getEmail());
			// 	$getUser = User::find($registerUser->id);
			// }
		    UserMeta::create(['user_id' => $getUser->id, 'meta_key' => $socmed . '_id', 'meta_value' => $user->getId()]);
		    UserMeta::create(['user_id' => $getUser->id, 'meta_key' => $socmed . '_details', 'meta_value' => json_encode($user)]);
		}
    	Sentry::login($registerUser, false);
    		return redirect('dashboard');
    }

    public function getUserMeta($metakey, $metavalue)
    {
    	$data = UserMeta::where('meta_key', $metakey)
    					->where('meta_value', $metavalue)
    					->first();
    	return $data;
    }
}
