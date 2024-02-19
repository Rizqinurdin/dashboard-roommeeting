<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';
    protected $fillable = [
        'id_room',
        'room_name',
        'location_room',
        'room_capacity',
        'image_room',
    ];

    public static function GenerateID()
    {

        $prefix = "RM" . date('ymd');
        $lastID = DB::table('room')->where('id_room', 'like', $prefix . '%')->max('id_room');

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
