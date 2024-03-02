<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WilayahModel extends Model
{
    use HasFactory;
    public static function getWilayahAll($request)  {
        $Sql = '';
        if (isset($request->q)) {
            $Sql .= 'and u.fullName like "%'.$request->q.'%" ';
        }
        $data = DB::select("select row_number() over (order by u.created_at desc) no, w.*, u.fullName from wilayah w, users u where w.userId=u.id   $Sql");
        return $data;
    }
}
