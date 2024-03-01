<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;

class UsersController extends Controller
{
    function users()
    {
        
        $request = Request();
        if ($request->method() == 'GET') {
            $data = User::getUsersAll($request);
            // dd($data);
            return response()->json([
                'success' => true,
                'message' => 'SuceesssFull Show Data',
                'allData' => $data,
                'data' => $data,
                'params' => $request->q,
                'total' => 10
            ]);
        }
        
    }
}
