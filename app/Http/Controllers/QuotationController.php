<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Quotation;

use App\Http\Controllers\BaseController as BaseController;

class QuotationController extends BaseController
{
    public function __construct()
	{
    }

    public function fetchAllQuotation(Request $request)
    {
        $quotations = Quotation::get();
        
        return $this->sendResponse($quotations, 'Successfully.');
    }

    public function update(Request $request, $quotation_id)
    {
		try {
			$item = Quotation::findOrFail($quotation_id);
		} catch (ModelNotFoundException $e) {
            return $this->sendError($e, '2001', 404);

		}

        // $validator = $this->Validator($request->all(), $quotation_id);

		// if($validator->fails()){
        //     return $this->sendError($validator->errors(), '2002', 400);
		// }else{
        //         $item->fill($request->all());
		// 		$item->save();
        // }

                $item->fill($request->all());
				$item->save();

		return $this->sendResponse($item, 'Quotation updated');
    }



    public function store(Request $request)
    {
        // $validator = $this->Validator($request->all(), 0, $request->company_id);

        // if ($validator->fails()){
		// 	return $this->sendError($validator->errors(), '2002', 400);
		// } else {
		// 	$item = new Perspective;
        //     $item->fill($request->all());
        //     $item->created_by = $this->authUser;
        //     $item->updated_by = $this->authUser;
		// 	$item->save();
        // }

        $item = new Quotation;
            $item->fill($request->all());
			$item->save();
		return $this->sendCreated($item, 'Quotation created');
    }
    

    public function destroy($quotation_id)
    {
        try {
            $item = Quotation::findOrFail($quotation_id);
         } catch (ModelNotFoundException $e) {
            return $this->sendError($e, '2001', 404);
        }

        try {
            $item->delete();
            return $this->sendDeleted('Quatation deleted.');
        } catch (Exception $ex) {
            return $this->sendError($ex, '2000', 400);
        }
    }


}
