<?php

namespace App\Http\Controllers;

use App\model\IncomeHistory;

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

class IncomeHistoryController extends Controller
{
    public function __construct()
	{
        //$this->middleware('jwt.verify');
       // $this->authUser = (JWTAuth::user()) ? JWTAuth::user()->user_name : $this->authUser;
    }

    public function show(Request $request)
    {
        $income_history_id = !empty($request->income_history_id)?$request->income_history_id:'';
        $income_history_data = Income::where('income_history_id',$income_history_id)
                            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [	
            'income' => 'required|integer',
            'expense' => 'required|integer',
            'year_no' => 'required|integer',
            'income_id' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $new_Income_history = new IncomeHistory;
        $new_Income_history->fill($request->all());
        $new_Income_history->save();

        return response()->json(['status' => 200 , 'data' => $new_Income_history]);

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [	
            'income' => 'required|integer',
            'expense' => 'required|integer',
            'year_no' => 'required|integer',
            'income_id' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'data' => $validator->errors()]);
        }

        $IncomeHistory = IncomeHistory::find($request->income_history_id);
        $IncomeHistory->fill($request->all());
        $IncomeHistory->save();

        return response()->json(['status' => 200 , 'data' => $IncomeHistory]);
    }

    public function destroy(Request $request)
    {
        try {
            $IncomeHistory = IncomeHistory::findOrFail($request->income_history_id);
            $IncomeHistory->delete();
		} catch (ModelNotFoundException $e) {
			return response()->json(['status' => 404, 'data' => 'Driver not found.']);
		}	
		return response()->json(['status' => 200]);
    }
}