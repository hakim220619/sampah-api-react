<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaketModel extends Model
{
    use HasFactory;
    public static function getPaketAll($request)  {
        $Sql = '';
        if (isset($request->q)) {
            $Sql .= 'and w.namePaket like "%'.$request->q.'%" ';
        }
        $data = DB::select("select row_number() over (order by w.created_at desc) no, w.* from paket w where 1=1   $Sql");
        return $data;
    }
    public static function AddPaket($request)  {
        $data = [
            'namePaket' => $request->data['namePaket'],
            'price' => $request->data['price'],
            'description' => $request->description,
            'state' => 'ON',
            'created_at' => now()
        ];
        DB::table('paket')->insert($data);
    }
    public static function EditPaket($request)  {
        $data = [
            'namePaket' => $request->namePaketEd,
            'price' => $request->priceEd,
            'description' => $request->descriptionEd,
            'state' => $request->stateEd,
            'updated_at' => now()
        ];
        DB::table('paket')->where('id', $request->id)->update($data);
    }
    public static function deletePaket($id)  {
        DB::table('paket')->where('id', $id)->delete();
    }
}
