<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    function getRole()
    {
        $data = DB::select("select * from role");
        dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
}
