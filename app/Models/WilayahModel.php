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
    public static function AddWilayah($request)  {
        $data = [
            'userId' => $request->usersId,
            'name' => $request->data['name'],
            'description' => $request->data['description'],
            'state' => 'ON',
            'created_at' => now()
        ];
        DB::table('wilayah')->insert($data);
    }
    public static function EditWilayah($request)  {
        $data = [
            'userId' => $request->userIdEd,
            'name' => $request->nameEd,
            'description' => $request->descriptionEd,
            'state' => $request->stateEd,
            'updated_at' => now()
        ];
        DB::table('wilayah')->where('id', $request->id)->update($data);
    }
    public static function deleteWilayah($id)  {
        DB::table('wilayah')->where('id', $id)->delete();
    }
}
