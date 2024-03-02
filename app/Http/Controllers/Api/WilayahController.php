<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WilayahModel;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    function wilayah()
    {

        $request = Request();
        switch ($request->method()) {
            case 'GET':
                $data = WilayahModel::getWilayahAll($request);
                // dd($data);
                return response()->json([
                    'success' => true,
                    'message' => 'SuceesssFull Show Data',
                    'allData' => $data,
                    'data' => $data,
                    'params' => $request->q,
                    'total' => 10
                ]);
                break;
                case 'POST':
                    // dd($request->all());
                    WilayahModel::AddUsers($request);
                    return response()->json([
                        'success' => true,
                        'message' => 'SuceesssFull Added Data',
                    ]);
                    break;
                case 'PATCH':
                    // dd($request->all());
                    WilayahModel::EditUsers($request);
                    return response()->json([
                        'success' => true,
                        'message' => 'SuceesssFull Edited Data',
                    ]);
                    break;
            case 'DELETE':

                WilayahModel::deleteUsers($request->id);
                return response()->json([
                    'success' => true,
                    'message' => 'SuceesssFull Deleted Data',
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}
