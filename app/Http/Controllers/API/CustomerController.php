<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
class CustomerController extends BaseController
{
  
    public function index()
    {
        $customer = User::where('type','user')->where('agent_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return $this->sendResponse($customer, 'Customer retrieved successfully.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();   
        $input['agent_id'] = Auth::user()->id;
        $validator = Validator::make($input, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'gender' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'dob' => 'required',
            'pancard' => 'required',
            'aadharcard' => 'required',
            'amount' => 'required',
            'nominee' => 'required',
            'agent_id' => 'required',
            'account_no'=> 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if($request->file('profile_image')){
            $file= $request->file('profile_image');
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'profile_image'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['profile_image']= 'doc/'.$filename;
        }

        if($request->file('pancard')){
            $file= $request->file('pancard');
            $extension = $request->file('pancard')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'pancard'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['pancard']= 'doc/'.$filename;
        }

         if($request->file('aadharcard')){
            $file= $request->file('aadharcard');
            $extension = $request->file('aadharcard')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'aadharcard'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['aadharcard']= 'doc/'.$filename;
        }
        
        if($request->file('aadharback')){
            $file= $request->file('aadharback');
            $extension = $request->file('aadharback')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'aadharback'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['aadharback']= 'doc/'.$filename;
        }
        // if($request->file('other')){
        //     $file= $request->file('other');
        //     $extension = $request->file('other')->getClientOriginalExtension();
        //     $filename = date('YmdHi'). 'other'. rand('0000','9999').'.'.$extension;
        //     $file->move(public_path('doc/'), $filename);
        //     $input['other']= 'doc/'.$filename;
        // }
        $files = [];
        if(isset($_FILES['other'])){

        if($_FILES['other']['size']>0)
         {
            foreach($request->file('other') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('doc/'), $name);  
                $files[] = $name;  
            }
            $input['other']=implode(',',$files);
         }
         
        }
        $input['policydate'] = date('Y-m-d');
        $input['password'] =Hash::make('123456');
        $customer = User::create($input);
   
        return $this->sendResponse($customer, 'Customer created successfully.');
    } 
   
  
    public function show($id)
    {
        
        $customer = User::where('id',$id)->first();
        $url = url('/customers').'/'.$customer->id;
        $image = \QrCode::size(200)->generate($url);
        $imageurl = base64_encode(\QrCode::format('png')->size(400)->generate($url));
        $customer->qr_image =  "data:image/png;base64, ".$imageurl.""; 
        if (is_null($customer)) {
            return $this->sendError('Customer not found.');
        }
   
        return $this->sendResponse($customer, 'Customer retrieved successfully.');
    }
    
   
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $input['agent_id'] = Auth::user()->id;
         $validator = Validator::make($input, [
            'name' => 'required',
            'gender' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'dob' => 'required',
            'amount' => 'required',
            'nominee' => 'required',
            'agent_id' => 'required',
            'account_no'=> 'required',
        ]);
   
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        } 

        if($request->file('profile_image')){
            $file= $request->file('profile_image');
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'profile_image'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['profile_image']= 'doc/'.$filename;
        }
        if($request->file('pancard')){
            $file= $request->file('pancard');
            $extension = $request->file('pancard')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'pancard'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['pancard'] = 'doc/'.$filename;
        }
         if($request->file('aadharcard')){
            $file= $request->file('aadharcard');
            $extension = $request->file('aadharcard')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'aadharcard'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc'), $filename);
            $input['aadharcard']= 'doc'.$filename;
        }

        
        if($request->file('aadharback')){
            $file= $request->file('aadharback');
            $extension = $request->file('aadharback')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'aadharback'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['aadharback']= 'doc/'.$filename;
        }

        $files = [];
        if($_FILES['other']['size']>0)
         {
            foreach($request->file('other') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('doc/'), $name);  
                $files[] = $name;  
            }
            $input['other']=implode(',',$files);
         }
        User::where('id',$id)->update($input);
        $customer = User::where('id',$id)->first();
        return $this->sendResponse($customer, 'Customer updated successfully.');
    }
   
   
    public function destroy($id)
    {

        User::where('id',$id)->delete();
   
        return $this->sendResponse([], 'Customer deleted successfully.');
    }

    public function send_otp(Request $request)
    {
        $user = User::where('username',$request->username)->first(); 
        if($user){

         User::where('username',$request->username)->update(array('otp'=>'1234')); 
         
         return $this->sendResponse(array('id'=>$user->id,'otp' =>$user->otp), 'Send OTP successfully successfully.');
        
        }else{
          return $this->sendError($user, 'User Not Found.');
    
        }
    }

    public function change_password(Request $request)
    {

         $user = User::where('id',$request->id)->where('otp',$request->otp)->first(); 
         if($user){
                User::where('id',$request->id)->update(array('password'=>Hash::make($request->password))); 

                return $this->sendResponse($user, 'Send change password successfully successfully.');
  
         }else{
                 return $this->sendError($user, 'Plese Enter Valid OTP.');
            
         }
    }
}