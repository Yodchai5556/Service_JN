<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Invoice;

use App\Http\Controllers\BaseController as BaseController;

class InvoiceController extends BaseController
{
    public function __construct()
	{
    }

    public function fetchAllInvoice(Request $request)
    {
        $invoices = Invoice::get();
        
        return $this->sendResponse($invoices, 'Successfully.');
    }

    public function update(Request $request, $invoice_id)
    {
		try {
			$item = Invoice::findOrFail($invoice_id);
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

		return $this->sendResponse($item, 'Invoice updated');
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

        $item = new Invoice;
            $item->fill($request->all());
			$item->save();
		return $this->sendCreated($item, 'Invoice created');
    }
    

    public function destroy($invoice_id)
    {
        try {
            $item = Invoice::findOrFail($invoice_id);
         } catch (ModelNotFoundException $e) {
            return $this->sendError($e, '2001', 404);
        }

        try {
            $item->delete();
            return $this->sendDeleted('Invoice deleted.');
        } catch (Exception $ex) {
            return $this->sendError($ex, '2000', 400);
        }
    }


}
