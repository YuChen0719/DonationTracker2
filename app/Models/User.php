<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'charity_id',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // public function userRole() {
    //     $users = DB::select('select * from users where userType = "admin" ');
    // }

    // The below functions are to determine whether a user is an admin/super_admin or a user.
    //This is used when checking authorization for the dashboard. Based on role, some routes may not be visable.
    public function isAdmin()
    {
       if(session()->has("userType")){
            return session()->get("userType") == "admin";
       }
       else{
           $user = DB::select('select * from users where id = :id', ['id' => Auth::id()]);
           session()->put("userType" , $user[0]->user_type);
           return session()->get("userType") == "admin";
       }
    }

    //super_admin has to be exactly what is in database userType value. Change accordingly.
    public function isSuperAdmin()
    {
       if(session()->has("userType")){
            return session()->get("userType") == "super_admin";
       }
       else{
           $user = DB::select('select * from users where id = :id', ['id' => Auth::id()]);
           session()->put("userType" , $user[0]->user_type);
           return session()->get("userType") == "super_admin";
       }
    }

}
