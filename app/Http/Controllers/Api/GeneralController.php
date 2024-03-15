<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GeneralModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    function getRole()
    {
        $data = GeneralModel::getRole();
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function getProvince()
    {
        $data = GeneralModel::getProvince();
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function getRegency($id)
    {
        $data = GeneralModel::getRegency($id);
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function getDistrict($id)
    {
        $data = GeneralModel::getDistrict($id);
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function getVillage($id)
    {
        $data = GeneralModel::getVillage($id);
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function getUserwilayah()
    {
        $data = GeneralModel::getUserwilayah();
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function listPaket()
    {
        $data = GeneralModel::listPaket();
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
    function listPaketDetail($id)
    {
        $data = GeneralModel::listPaketDetail($id);
        // dd($data);
        return response()->json([
            'success' => true,
            'message' => 'SuceesssFull Show Data',
            'data' => $data,
        ]);
    }
}
