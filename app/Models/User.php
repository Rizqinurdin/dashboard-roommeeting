<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'id_user',
        'id_department',
        'email',
        'password',
        'name',
        'gender',
        'address',
        'phone_number',
        'place_of_birth',
        'date_of_birth',
        'role',
    ];

    public static function GenerateID()
    {

        $prefix = "USER" . date('ymd');
        $lastID = DB::table('users')->where('id_user', 'like', $prefix . '%')->max('id_user');

        if ($lastID == null) {

            return $prefix . "000000000000001";
        } else {
            $lastID = str_replace($prefix, '', $lastID);
            $lastID = (int) $lastID;
            $lastID += 1;
            $lastID = str_pad($lastID, 15, '0', STR_PAD_LEFT);
            return $prefix . $lastID;
        }
    }
}
