<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Postoffice_payment;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use URL;
use Session;
use Auth;
class UserController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        $data = User::where('type','agent')->orderBy('id', 'desc')->get();        
        return view('users.index', compact('data'));
    }

    
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
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

        if($request->file('other')){
            $file= $request->file('other');
            $extension = $request->file('other')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'other'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['other']= 'doc/'.$filename;
        }
        $user = User::create($input);
        if($input['type'] == 'agent'){

          return redirect()->route('users.index')
            ->with('success', 'Agent created successfully.');
        }elseif($input['type'] == 'user'){
          return redirect()->route('customers')
            ->with('success', 'Customer created successfully.');
        }
    }

    
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

 
    public function edit($id)
    {
        $post = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $post->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('post', 'roles', 'userRole'));
    }

      public function customers_edit($id)
    {
        $post = User::find($id);

        $agent = User::where('type','agent')->pluck('name','id')->all();
        return view('customer.edit', compact('post','agent'));
    }


    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'password' => 'confirmed',
        ]);
    
        $input = $request->all();
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
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

        if($request->file('other')){
            $file= $request->file('other');
            $extension = $request->file('other')->getClientOriginalExtension();
            $filename = date('YmdHi'). 'other'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('doc/'), $filename);
            $input['other']= 'doc/'.$filename;
        }
        $user->update($input);
         if($input['type'] == 'agent'){

          return redirect()->route('users.index')
            ->with('success', 'Agent updated successfully.');
        }elseif($input['type'] == 'user'){
          return redirect()->route('customers')
            ->with('success', 'Customer updated successfully.');
        }
       
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }


    public function customers_delete($id){
          User::find($id)->delete();

        return redirect()->route('customers')
            ->with('success', 'Customer deleted successfully.');
    }

    public function statuschange(Request $request){
        $dt = $request->all();
        
        if($dt['status'] == 1){
            $status = 0;
        }else{
            $status = 1;   
        }
        
        User::where('id',$dt['id'])->update(array('status' => $status));
       
    }

  
     public function customers(){   

        // $agent =  User::whereHas('roles', function($q){ $q->where('name', 'agent'); } )->get();
        $agent =  User::where('type','agent')->get();
        return view('customer.index',compact('agent'));
     }
     public function customerlist(Request $request) {
        if ($request->agentid != '') {
          
         
          $industry = User::with('agent')->where('type','user')->where('agent_id',$request->agentid)->orderBy('id','DESC')->get();
        }else{

           $industry = User::with('agent')->where('type','user')->orderBy('id','DESC')->get();
        }
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->addColumn('agent', function($row) {
                            if($row->agent){
                               return $row->agent->name;
                            }else{
                               return '';
                            }
                        })
                        ->addColumn('pancard', function($row) {
                            
                            return '<a href="'.URL::to('/').'/'.$row->pancard.'" target="_blank"><img src="'.URL::to('/').'/'.$row->pancard.'"></a>';
                        })
                        ->addColumn('aadharcard', function($row) {
                            return '<a href="'.URL::to('/').'/'.$row->aadharcard.'" target="_blank"><img src="'.URL::to('/').'/'.$row->aadharcard.'"></a>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                                   
                            $btn .= ' <a class="btn btn-success" style="margin-right:5px" href="' . route('payments', [$row->id]) . '">show</a>';
                            $btn .= '  <a class="btn btn-primary" style="margin-right:5px" href="'.route('customers.edit',[$row->id]).'">Edit</a>';  
                            $btn .= '  <a class="btn btn-danger" href="'.route('customers.delete',[$row->id]).'">Delete</a>';
                            $btn .= '</div>';
                            return $btn;
                        })
                        ->rawColumns([
                            'agent' => 'agent',
                            'pancard' => 'pancard',
                            'aadharcard' => 'aadharcard',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

     public function payments($id){
        $customer = User::find($id); 
        return view('payment.index',compact('customer'));
     }
     public function paymentlist(Request $request) {
      
        if($request->month !=''){
         
        $industry = Payment::where('payment_date','>=',date('Y-m-d',strtotime($request->fmonth)))->where('payment_date','<=',date('Y-m-d',strtotime($request->month )))->where('customer_id',$_GET['customer_id'])->orderBy('id','DESC')->get();
        }else{
        $current =date('m-Y');
        $industry = Payment::where('payment_date','>=',date('Y-m-d',strtotime('01-'.$curren)))->where('payment_date','<=',date('Y-m-d',strtotime('31-'.$curren )))->where('customer_id',$_GET['customer_id'])->orderBy('id','DESC')->get();    
        }
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                         ->addColumn('post_amount', function($row) {
                          
                            $p_pay = DB::table('postoffice_payments')->where('created_at','>=',date('Y-m-d 00:00:00',strtotime($row->payment_date)))->where('created_at','<=',date('Y-m-d 23:59:00',strtotime($row->payment_date)))->where('customer_id',$row->customer_id)->sum('amount');
                           
                            if($p_pay != ''){
                               
                                $po_amt =  $p_pay;
                            }else{
                                $po_amt = 0;
                            }
                            return   $po_amt;
                        })
                         ->addColumn('post_opening', function($row) {
                           
                            $pay = DB::table('postoffice_payments')->where('created_at','>=',date('Y-m-d 00:00:00',strtotime($row->payment_date)))->where('created_at','<=',date('Y-m-d 23:59:00',strtotime($row->payment_date)))->where('customer_id',$row->customer_id)->first();
                            if($pay != ''){
                               
                                $p_opening_balance =  $pay->opening_balance;
                            }else{
                                $p_opening_balance = 0;
                            }
                            return   $p_opening_balance;
                        })
                        ->addColumn('post_closing', function($row) {
                            $pay = DB::table('postoffice_payments')->where('created_at','>=',date('Y-m-d 00:00:00',strtotime($row->payment_date)))->where('created_at','<=',date('Y-m-d 23:59:00',strtotime($row->payment_date)))->where('customer_id',$row->customer_id)->first();
                            if($pay != ''){
                               
                                $p_closing_balance =  $pay->closing_balance;
                            }else{
                                $p_closing_balance = 0;
                            }
                           
                            return   $p_closing_balance;
                        })
                         ->addColumn('remaining', function($row) {
                               $pay = DB::table('payments')->where(array('customer_id'=>$row->customer_id))->orderBy('id','DESC')->limit(1)->first();
                          
                               $pay2 = DB::table('postoffice_payments')->where(array('customer_id'=>$row->customer_id))->orderBy('id','DESC')->limit(1)->first();
                            if($pay2 != ''&& $pay != ''){
                                $remaining =  $pay->opening_balance-$pay2->opening_balance;
                            }elseif($pay != ''){
                                $remaining = '-'.$pay->opening_balance;
                            }else{
                                $remaining = 0;
                            }
                            return   $remaining;
                        })
                        ->rawColumns([
                            'created_at' => 'created_at',
                            'post_closing' => 'post_closing',
                            'post_opening' => 'post_opening',
                            'post_amount' => 'post_amount',
                            'remaining' =>'remaining'
                        ])
                        ->make(true);
    }

    public function popaymentlist(Request $request) {
        if($request->month !=''){
         
        $industry = Postoffice_payment::where('payment_date','>=',date('Y-m-d',strtotime($request->fmonth)))->where('payment_date','<=',date('Y-m-d',strtotime($request->month )))->where('customer_id',$_GET['customer_id'])->orderBy('id','DESC')->get();
        }else{
        $current =date('m-Y');
        $industry = Postoffice_payment::where('payment_date','>=',date('Y-m-d',strtotime('01-'.$curren)))->where('payment_date','<=',date('Y-m-d',strtotime('31-'.$curren )))->where('customer_id',$_GET['customer_id'])->orderBy('id','DESC')->get();    
        }
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                      
                        ->rawColumns([
                            'created_at' => 'created_at',
                        ])
                        ->make(true);
    }

    public function report(Request $request){
        $input = $request->all();
        $date = $input['month'];
        $user = User::with('customer')->whereIn('id',$input['user'])->get();  
        return view('payment.report',compact('user','date'));
    }
    public function customers_create(){
        $agent = User::where('type','agent')->pluck('name','id')->all();
         return view('customer.create',compact('agent'));
    }
    public function monthly_report(){
        $users = User::where('type','user')->get();
        $agent =  User::where('type','agent')->get();
      
        return view('customer.monthly-report',compact('users','agent'));
   }

    public function monthlylist(Request $request) {
        Session::put('currentmonth', $request->month);
        Session::put('startdate',date('Y-m-d 00:00:00',strtotime('01-'.Session::get('currentmonth'))));
        Session::put('enddate',date('Y-m-d 23:58:00',strtotime('31-'.Session::get('currentmonth'))));
        if($request->date !=''){
        Session::put('startdate',date('Y-m-d 00:00:00',strtotime($request->date)));
        Session::put('enddate',date('Y-m-d 23:58:00',strtotime($request->date)));
        }
        if ($request->customerid!= '') {
          
          $industry = User::with('agent')->where('type','user')->where('id',$request->customerid)->orderBy('id','DESC')->get();
        }elseif ($request->agentid!= '') {
          $industry = User::with('agent')->where('type','user')->where('agent_id',$request->agentid)->orderBy('id','DESC')->get();  
        }else{
          $industry = User::with('agent')->where('type','user')->orderBy('id','DESC')->get();
        }
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->addColumn('amountt', function($row) {
                            $pay = DB::table('payments')->where('payment_date','>=',Session::get('startdate'))->where('payment_date','<=',Session::get('enddate'))->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->sum('amount');

                            if($pay != ''){
                               
                                $opening_balance =  $pay;
                            }else{
                                $opening_balance = 0;
                            }
                            return   $opening_balance;
                        })
                        ->addColumn('opening', function($row) {
                            $pay = DB::table('payments')->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->limit(1)->first();
                            if($pay != ''){
                               
                                $opening_balance =  $pay->opening_balance;
                            }else{
                                $opening_balance = 0;
                            }
                            return   $opening_balance;
                        })
                        ->addColumn('closing', function($row) {
                               $pay2 = DB::table('payments')->where('customer_id',$row->id)->orderBy('id','DESC')->limit(1)->first();
                            if($pay2 != ''){
                               
                                $closing_balance =  $pay2->closing_balance;
                            }else{
                                $closing_balance = 0;
                            }
                            return   $closing_balance;
                        })

                         ->addColumn('post_amount', function($row) {
                            $p_pay = DB::table('postoffice_payments')->where('payment_date','>=',Session::get('startdate'))->where('payment_date','<=',Session::get('enddate'))->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->sum('amount');
                           
                            if($p_pay != ''){
                               
                                $opening_balance =  $p_pay;
                            }else{
                                $opening_balance = 0;
                            }
                            return   $opening_balance;
                        })
                         ->addColumn('post_opening', function($row) {
                            $pay = DB::table('postoffice_payments')->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->limit(1)->first();
                            if($pay != ''){
                               
                                $p_opening_balance =  $pay->opening_balance;
                            }else{
                                $p_opening_balance = 0;
                            }
                            return   $p_opening_balance;
                        })
                        ->addColumn('post_closing', function($row) {
                               $pay2 = DB::table('postoffice_payments')->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->limit(1)->first();
                            if($pay2 != ''){
                               
                                $p_closing_balance =  $pay2->closing_balance;
                            }else{
                                $p_closing_balance = 0;
                            }
                            return   $p_closing_balance;
                        })
                        ->addColumn('remaining', function($row) {
                               $pay = DB::table('payments')->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->limit(1)->first();
                          
                               $pay2 = DB::table('postoffice_payments')->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->limit(1)->first();
                            if($pay2 != ''&& $pay != ''){
                                $remaining =  $pay->opening_balance-$pay2->opening_balance;
                            }elseif($pay != ''){
                                $remaining = '-'.$pay->opening_balance;
                            }else{
                                $remaining = 0;
                            }
                            return   $remaining;
                        })
                        ->addColumn('payment_month', function($row) {
                                 $pay21 = DB::table('postoffice_payments')->where('payment_date','>=',Session::get('startdate'))->where('payment_date','<=',Session::get('enddate'))->where(array('customer_id'=>$row->id))->orderBy('id','DESC')->first();
                                if($pay21 != ''){
                                    if(!empty($pay21->payment_month)){
                                      $payment_month = $pay21->payment_month;
                                    }else{
                                      $payment_month = '';
                                    }
                                }else{
                                    $payment_month = '';
                                }
                            return    $payment_month;
                        })
                        ->addColumn('month', function($row) {
                              
                            return  date('m-Y',strtotime(Session::get('startdate')));
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <button style="margin-right: 20px;" type="button" class="btn btn-primary addposamount" id="' .$row->id. '">Add PO Amount</button>';
                            $btn .= ' <button type="button" class="btn btn-primary addmainamount" id="' .$row->id. '">Add Main Amount</button>';
                            $btn .= '</div>';
                            // $btn2 = '';
                            // $btn2 .= '<div class="btn-group">';
                            // $btn2 .= ' <button type="button" class="btn btn-primary addposamount" id="' .$row->id. '">Add Main Amount</button>';
                            // $btn2 .= '</div>';
                            return $btn;
                           
                        })
                        ->rawColumns([
                            'amountt' => 'amountt',
                            'opening' => 'opening',
                            'closing' => 'closing',
                            'post_opening' => 'post_opening',
                            'post_closing' => 'post_closing',
                            'post_amount' => 'post_amount',
                            'payment_month'=>'payment_month',
                            'remaining' => 'remaining',
                            'month' => 'month',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    public function pomonthlylist(Request $request) {
        Session::put('currentmonth', $request->month);
       if ($request->agentid!= '') {
          $industry = User::where('type','agent')->where('id',$request->agentid)->orderBy('id','DESC')->get();  
        }else{
          $industry = User::where('type','agent')->orderBy('id','DESC')->get();
        }
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->addColumn('totalmainamt', function($row) {
                            $pay = DB::table('payments')->where('payment_date','>=',date('Y-m-d',strtotime('01-'.Session::get('currentmonth'))))->where('payment_date','<=',date('Y-m-d',strtotime('31-'.Session::get('currentmonth'))))->where(array('user_id'=>$row->id))->sum('amount');
                            if($pay != ''){
                               
                                $opening_balance =  $pay;
                            }else{
                                $opening_balance = 0;
                            }
                            return   $opening_balance;
                        })
                        ->addColumn('totalpoamt', function($row) {
                            $pay = DB::table('postoffice_payments')->where('payment_date','>=',date('Y-m-d',strtotime('01-'.Session::get('currentmonth'))))->where('payment_date','<=',date('Y-m-d',strtotime('31-'.Session::get('currentmonth'))))->where(array('customer_id'=>$row->id))->sum('amount');
                            if($pay != ''){
                               
                                $opening_balance =  $pay->opening_balance;
                            }else{
                                $opening_balance = 0;
                            }
                            return   $opening_balance;
                        })
                       
                        // ->addColumn('action', function($row) {
                        //     $btn = '';
                        //     $btn .= '<div class="btn-group">';
                        //     $btn .= ' <button style="margin-right: 20px;" type="button" class="btn btn-primary addposamount" id="' .$row->id. '">Add PO Amount</button>';
                        //     $btn .= ' <button type="button" class="btn btn-primary addmainamount" id="' .$row->id. '">Add Main Amount</button>';
                        //     $btn .= '</div>';
                        //     return $btn;
                           
                        // })
                        ->rawColumns([
                            'totalmainamt' => 'totalmainamt',
                            'totalpoamt' => 'totalpoamt'
                        ])
                        ->make(true);
    }

    public function mainstore(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        unset($input['_token']);
        $input['payment_by'] = 'admin';
        $last_amount = Payment::where('customer_id',$input['customer_id'])->orderBy('id','DESC')->first();
        if(empty($last_amount)){
            $last_amount =0;
        }else{
            $last_amount =  $last_amount->opening_balance;
        }
        $input['closing_balance'] =$last_amount;
        $input['opening_balance'] =$last_amount+$input['amount'];
       
        $input['payment_date'] = date('Y-m-d');
        $payment = Payment::create($input);
        if($payment){
               echo 'success';
        } else{
             echo 'failed';
        }
    } 

    public function po_report(Request $request)
    {

        $users = User::where('type','user')->get();
        $agent =  User::where('type','agent')->get();
      
        return view('customer.po-report',compact('users','agent'));
    }
    
    
}