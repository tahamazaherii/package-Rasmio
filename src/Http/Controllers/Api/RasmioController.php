<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RasmioService;
use App\Http\Controllers\Controller;

class RasmioController extends Controller
{
    protected $RasmioService;


    public function __construct(RasmioService $RasmioService)
    {
        $this->RasmioService = $RasmioService;
    }

    public function companyInfo(Request $request){
        $request->validate([
            'companyID' => 'required',
        ]);


        $getcompanyInfo = $this->RasmioService->CompanyInfo($request->companyID);
        return json_decode($getcompanyInfo);
    }
    public function companyNewsInfo(Request $request){
        $request->validate([
            'companyID' => 'required',
        ]);

        $getcompanyNewsInfo = $this->RasmioService->CompanyNewsInfo($request->companyID);
        return json_decode($getcompanyNewsInfo);
    }
}
