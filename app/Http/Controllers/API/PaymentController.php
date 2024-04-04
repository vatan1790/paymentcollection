<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class PaymentController extends BaseController
{
  
    public function index(Request $request)
    {    
        if($request->customer_id){

        $payment = Payment::with('customer','user')->where('customer_id',$request->customer_id)->orderby('id','DESC')->get();
        }elseif($request->agent_id){

        $payment = Payment::with('customer','user')->where('user_id',$request->agent_id)->orderby('id','DESC')->get();
        }else{

        $payment = Payment::with('customer','user')->orderby('id','DESC')->get();
        }
        return $this->sendResponse($payment, 'Payment retrieved successfully.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $validator = Validator::make($input, [
            'customer_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
            'payment_by' => 'required',
            'description' => 'required',
            'payment_status' => 'required'
        ]);
        $last_amount = Payment::where('customer_id',$input['customer_id'])->orderBy('id','DESC')->first();
        if(empty($last_amount)){
            $last_amount =0;
        }else{
            $last_amount =  $last_amount->opening_balance;
        }
        $input['closing_balance'] =$last_amount;
        $input['opening_balance'] =$last_amount+$input['amount'];
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $input['payment_date'] = date('Y-m-d');
        $payment = Payment::create($input);
   
        return $this->sendResponse($payment, 'Payment created successfully.');
    } 
   
  
    public function show($id)
    {

        $payment = Payment::with('customer','user')->find($id);
  
        if (is_null($payment)) {
            return $this->sendError('Payment not found.');
        }
   
        return $this->sendResponse($payment, 'Payment retrieved successfully.');
    }
    
   
    public function update(Request $request, Payment $payment)
    {
        $input = $request->all();
         $validator = Validator::make($input, [
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'pancard' => 'required',
            'aadharcard' => 'required',
            'amount' => 'required',
            'nominee' => 'required',
            'payment_status' => 'required'
        ]);
   
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $payment->name = $input['name'];
        $payment->gender = $input['gender'];
        $payment->address = $input['address'];
        $payment->dob = $input['dob'];
        $payment->pancard = $input['pancard'];
        $payment->aadharcard = $input['aadharcard'];
        $payment->amount = $input['amount'];
        $payment->nominee = $input['nominee'];
        $payment->save();
   
        return $this->sendResponse($payment, 'Payment updated successfully.');
    }
   
   
    public function destroy(Payment $payment)
    {

        $payment->delete();
   
        return $this->sendResponse([], 'Payment deleted successfully.');
    }
}