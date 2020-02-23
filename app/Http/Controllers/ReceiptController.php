<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Receipt;

use App\Http\Controllers\BaseController as BaseController;

class ReceiptController extends BaseController
{
    public function __construct()
	{
    }

    public function fetchAllReceipt(Request $request)
    {
        $receipts = Receipt::get();
        
        return $this->sendResponse($receipts, 'Successfully.');
    }

    public function update(Request $request, $receipt_id)
    {
		try {
			$item = Receipt::findOrFail($receipt_id);
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

		return $this->sendResponse($item, 'Receipt updated');
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

        $item = new Receipt;
            $item->fill($request->all());
			$item->save();
		return $this->sendCreated($item, 'Receipt created');
    }
    

    public function destroy($receipt_id)
    {
        try {
            $item = Receipt::findOrFail($receipt_id);
         } catch (ModelNotFoundException $e) {
            return $this->sendError($e, '2001', 404);
        }

        try {
            $item->delete();
            return $this->sendDeleted('Receipt deleted.');
        } catch (Exception $ex) {
            return $this->sendError($ex, '2000', 400);
        }
    }


}
