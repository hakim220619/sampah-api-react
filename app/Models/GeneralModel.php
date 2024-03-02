<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralModel extends Model
{
    use HasFactory;
    public static function getRole()  {
       
        $data = DB::table('role')->get();
        return $data;
    }
    public static function getProvince()  {
       
        $data = DB::table('province')->get();
        return $data;
    }
    public static function getRegency($id)  {
       
        $data = DB::table('regency')->where('id_propinsi', $id)->get();
        return $data;
    }
    public static function getDistrict($id)  {
       
        $data = DB::table('district')->where('id_kabupaten', $id)->get();
        return $data;
    }
    public static function getVillage($id)  {
       
        $data = DB::table('village')->where('id_kecamatan', $id)->get();
        return $data;
    }
    public static function getUserwilayah()  {
       
        $data = DB::table('users')->where('role', 'ADW')->get();
        return $data;
    }
}
