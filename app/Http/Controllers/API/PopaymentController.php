<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Postoffice_payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class PopaymentController extends BaseController
{
  
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $last_amount = Postoffice_payment::where('customer_id',$input['customer_id'])->orderBy('id','DESC')->first();
        if(empty($last_amount)){
            $last_amount =0;
        }else{
            $last_amount =  $last_amount->opening_balance;
        }
        $input['closing_balance'] =$last_amount;
        $input['opening_balance'] =$last_amount+$input['amount'];
        $input['payment_status'] = 'paid';
        $input['payment_by'] = 'admin';
        $input['payment_date'] = date('Y-m-d',strtotime($input['payment_date']));
        $payment = Postoffice_payment::create($input);
   
        if($payment){
            echo 'success';
        }
    } 
    
   
   
}