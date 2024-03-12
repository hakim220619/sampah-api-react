<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaketModel;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    function paket()
    {

        $request = Request();
        switch ($request->method()) {
            case 'GET':
                $data = PaketModel::getPaketAll($request);
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
                    PaketModel::AddPaket($request);
                    return response()->json([
                        'success' => true,
                        'message' => 'SuceesssFull Added Data',
                    ]);
                    break;
                case 'PATCH':
                    // dd($request->all());
                    PaketModel::EditPaket($request);
                    return response()->json([
                        'success' => true,
                        'message' => 'SuceesssFull Edited Data',
                    ]);
                    break;
            case 'DELETE':
                PaketModel::deletePaket($request->id);
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
