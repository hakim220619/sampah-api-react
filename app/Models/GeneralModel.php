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
       
        $data = DB::select("select u.*, p.nama as province, r.nama as regency, d.nama as district, v.nama as village from users u, province p, regency r, district d, village v WHERE u.provinceId=p.id and u.regencyId=r.id and u.districtId=d.id and u.villageId=v.id and u.role = 'ADW'");
        return $data;
    }
}
