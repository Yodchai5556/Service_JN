<?php

namespace App\Http\Controllers;

use App\model\Driver;

use Auth;
use DB;
use File;
use Validator;
use Excel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller as Controller;

class testCon extends Controller
{
    public function __construct()
	{
        //$this->middleware('jwt.verify');
       // $this->authUser = (JWTAuth::user()) ? JWTAuth::user()->user_name : $this->authUser;
    }

    public function show(Request $request)
    {
        $driver_id = !empty($request->driver_id)?$request->driver_id:'';
        $Driver_data = Driver::where('driver',$driver_id)
                            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [	
            'driver_name' => 'required',
            'car_license' => 'required',
            'passport_id' => 'required',
            'driving_license' => 'required',
            'engine_no' => 'required',
            'car_type' => 'required',
            'insurance' => 'required:integer',
            'tel' => 'required',
            'color' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $new_Driver = new Driver;
        $Driver_data->fill($request->all());
        $Driver_data->save();

        return response()->json(['status' => 200 , 'data' => $new_Driver]);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [	
            'driver_name' => 'required',
            'car_license' => 'required',
            'passport_id' => 'required',
            'driving_license' => 'required',
            'engine_no' => 'required',
            'car_type' => 'required',
            'insurance' => 'required:integer',
            'tel' => 'required',
            'color' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $Driver = Driver::find($request->driver_id);
        $Driver->fill($request->all());
        $Driver->save();

        return response()->json(['status' => 200 , 'data' => $Driver]);
    }

    public function destroy(Request $request)
    {
        try {
            $Driver = Driver::findOrFail($request->driver_id);
            $Driver->delete();
		} catch (ModelNotFoundException $e) {
			return response()->json(['status' => 404, 'data' => 'Driver not found.']);
		}	
		return response()->json(['status' => 200]);
    }
}