<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'id_department',
        'department_name',
        'department_description',
    ];


    public static function GenerateID()
    {

        $prefix = "DPRT" . date('ymd');
        $lastID = DB::table('department')->where('id_department', 'like', $prefix . '%')->max('id_department');

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
