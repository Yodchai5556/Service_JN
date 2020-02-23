<?php

namespace App\Http\Controllers;

use App\model\Income;

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

class IncomeController extends Controller
{
    public function __construct()
	{
        //$this->middleware('jwt.verify');
       // $this->authUser = (JWTAuth::user()) ? JWTAuth::user()->user_name : $this->authUser;
    }

    public function show(Request $request)
    {
        $income_id = !empty($request->income_id)?$request->income_id:'';
        $income_data = Income::where('income_id',$income_id)
                            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [	
            'total_income' => 'required|integer',
            'total_expense' => 'required|integer',
            'year_no' => 'required|integer',
            'produre_id' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $new_Income = new Income;
        $new_Income->fill($request->all());
        $new_Income->save();

        return response()->json(['status' => 200 , 'data' => $new_Income]);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [	
            'total_income' => 'required|integer',
            'total_expense' => 'required|integer',
            'year_no' => 'required|integer',
            'produre_id' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $Income = Income::find($request->income_id);
        $Income->fill($request->all());
        $Income->save();

        return response()->json(['status' => 200 , 'data' => $new_Driver]);
    }

    public function destroy(Request $request)
    {
        try {
            $Income = Driver::findOrFail($request->driver_id);
            $Income->delete();
		} catch (ModelNotFoundException $e) {
			return response()->json(['status' => 404, 'data' => 'Driver not found.']);
		}	
		return response()->json(['status' => 200]);
    }
}