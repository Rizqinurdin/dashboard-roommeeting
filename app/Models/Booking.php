<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;


    protected $table = 'booking';

    protected $fillable = [
        'id_booking',
        'id_room',
        'id_user',
        'id_department',
        'start_date_time',
        'end_date_time',
        'purpose',
        'status',
    ];



    public static function GenerateID()
    {

        $prefix = "BOOKING" . date('ymd');
        $lastID = DB::table('booking')->where('id_booking', 'like', $prefix . '%')->max('id_booking');

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
