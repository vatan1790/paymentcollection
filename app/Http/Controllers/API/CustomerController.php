<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use Validator;
   
class CustomerController extends BaseController
{
  
    public function index()
    {
        $customer = Customer::all();
        return $this->sendResponse($customer, 'Customer retrieved successfully.');
    }
    
    public function store(Request $request)
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
            'nominee' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $customer = Customer::create($input);
   
        return $this->sendResponse($customer, 'Customer created successfully.');
    } 
   
  
    public function show($id)
    {
        $customer = Customer::find($id);
  
        if (is_null($customer)) {
            return $this->sendError('Customer not found.');
        }
   
        return $this->sendResponse($customer, 'Customer retrieved successfully.');
    }
    
   
    public function update(Request $request, Customer $customer)
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
            'nominee' => 'required'
        ]);
   
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $customer->name = $input['name'];
        $customer->gender = $input['gender'];
        $customer->address = $input['address'];
        $customer->dob = $input['dob'];
        $customer->pancard = $input['pancard'];
        $customer->aadharcard = $input['aadharcard'];
        $customer->amount = $input['amount'];
        $customer->nominee = $input['nominee'];
        $customer->save();
   
        return $this->sendResponse($customer, 'Customer updated successfully.');
    }
   
   
    public function destroy(Customer $customer)
    {

        $customer->delete();
   
        return $this->sendResponse([], 'Customer deleted successfully.');
    }
}