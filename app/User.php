<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordResetUserNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function token(){
        return $this->hasOne('App\Token','id','user_id');
    }

    public function iinecount(){
        return $this->hasOne('App\Iinecount','id','user_id');
    }

    public function menu(){
        return $this->hasMany('App\Menu','id','user_id');
    }

    public function createUser($request){
        $user = new User();

        $params = ['name','email','password'];
        $request->password = Hash::make($request['password']);

        foreach($params as $param){
            $user->$param = $request->$param;
        }

        $user->save();        
    }

    public function sendPasswordResetNotification($token)
    {
        // $reset = new CanResetPassword();
        // $reset->sendPasswordResetNotification($email);
        $this->notify(new PasswordResetUserNotification($token));  
    }
}
