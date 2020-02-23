<?php

namespace App\Http\Controllers;

use App\model\Tax;

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
        $tax_id = !empty($request->tax_id)?$request->tax_id:'';
        $tax_data = Tax::where('tax_id',$tax_id)
                            ->get();
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [	
        //     'income' => 'required|integer',
        //     'expense' => 'required|integer',
        //     'month_no' => 'required|integer',
        //     'income_id' => 'required|integer',
        //     'month_name' => 'required'

        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['status' => 400, 'data' => $validator->errors()]);
        // }

        $new_tax = new Tax;
        $new_tax->fill($request->all());
        $new_tax->save();

        return response()->json(['status' => 200 , 'data' => $new_tax]);

    }

    public function update(Request $request){
        // $validator = Validator::make($request->all(), [	
        //     'income' => 'required|integer',
        //     'expense' => 'required|integer',
        //     'month_no' => 'required|integer',
        //     'income_id' => 'required|integer',
        //     'month_name' => 'required'

        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['status' => 400, 'data' => $validator->errors()]);
        // }

        $tax = Tax::find($request->tax_id);
        $tax->fill($request->all());
        $tax->save();

        return response()->json(['status' => 200 , 'data' => $tax]);
    }

    public function destroy(Request $request)
    {
        try {
            $tax = Tex::findOrFail($request->tax_id);
            $tax->delete();
		} catch (ModelNotFoundException $e) {
			return response()->json(['status' => 404, 'data' => 'Driver not found.']);
		}	
		return response()->json(['status' => 200]);
    }
}