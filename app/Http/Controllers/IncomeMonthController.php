<?php

namespace App\Http\Controllers;

use App\model\IncomeMonth;

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

class IncomeMonthController extends Controller
{
    public function __construct()
	{
        //$this->middleware('jwt.verify');
       // $this->authUser = (JWTAuth::user()) ? JWTAuth::user()->user_name : $this->authUser;
    }

    public function show(Request $request)
    {
        $income_month_id = !empty($request->income_month_id)?$request->income_month_id:'';
        $income_month_data = Income::where('income_month_id',$income_month_id)
                            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [	
            'income' => 'required|integer',
            'expense' => 'required|integer',
            'month_no' => 'required|integer',
            'income_id' => 'required|integer',
            'month_name' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $new_Income_month = new IncomeMonth;
        $new_Income_month->fill($request->all());
        $new_Income_month->save();

        return response()->json(['status' => 200 , 'data' => $new_Income_month]);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [	
            'income' => 'required|integer',
            'expense' => 'required|integer',
            'month_no' => 'required|integer',
            'income_id' => 'required|integer',
            'month_name' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $IncomeMonth = IncomeMonth::find($request->income_month_id);
        $IncomeMonth->fill($request->all());
        $IncomeMonth->save();

        return response()->json(['status' => 200 , 'data' => $IncomeMonth]);
    }

    public function destroy(Request $request)
    {
        try {
            $IncomeMonth = IncomeMonth::findOrFail($request->income_month_id);
            $IncomeMonth->delete();
		} catch (ModelNotFoundException $e) {
			return response()->json(['status' => 404, 'data' => 'Driver not found.']);
		}	
		return response()->json(['status' => 200]);
    }
}