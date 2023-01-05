<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Cities;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function statelist(Request $request) {

        $input = $request->all();
        $states = State::where('country_id', $input['country_id'])->get()->toArray();
        if (count($states)) {
            $message = 'Success';
            return Response()->json($states);
        }
    }

    public function citylist(Request $request) {

        $input = $request->all();
        $city = Cities::where('state_id', $input['state_id'])->get()->toArray();
        if (count($city)) {
            $message = 'Success';
            return Response()->json($city);
        } else {
            $message = 'Data not found';
            return Response()->json($city);
        }
    }

    public function SalesChart(Request $request){
        $time = $request->time;
        if ($time == 'Monthly') {
             $sales = array();
             for ($i=1; $i <= 12 ; $i++) { 
                      $arr = array(
                          'delete_status'=>'1'
                      );
              
                $total2 = DB::table('invoices')
                             ->where('created_at','>=',date("Y-m-01",strtotime(date("Y")."-".$i."-01")))
                             ->where('created_at','<=',date("Y-m-t",strtotime(date("Y")."-".$i."-01")))
                             ->where('delete_status','=','1')
                            ->sum('total');
                            
                if ($total2 > 0) {
                     
                  $sales[] = (float)$total2; 
                 }else{
                   
                  $sales[] =   0;  
                 }
                      $month[] =  date("M",strtotime(date("Y")."-".$i."-01"));
 
                  } 
             echo json_encode(array('sales' => $sales,'month'=>$month));
         }
        elseif ($time == 'Yearly'){
            $sales = array();
            $date = array();
            for ($i=0; $i <7 ; $i++) { 
                //  $total2 = $this->db->where(array('date >=' => date('Y-01-01', strtotime(' -'.$i.' year')),'date <=' =>date('Y-12-t', strtotime(' -'.$i.' year')),'delivery_status' => 'Delivered','status'=>0))->select_sum('price')->get('sale')->row('price');

                $total2 = DB::table('invoices')
                             ->where('created_at','>=',date('Y-01-01', strtotime(' -'.$i.' year')))
                             ->where('created_at','<=',date('Y-12-t', strtotime(' -'.$i.' year')))
                             ->where('delete_status','=','1')
                            ->sum('total');
             if ($total2 > 0) {
                 
              $sales[] = (float)$total2; 
             }else{
               
              $sales[] =   0;  
             }
                 $date[] = date('Y', strtotime(' -'.$i.' year'));
            }
            $month = $date;
            echo json_encode(array('sales' => $sales,'month'=>$month));
 
        }
        elseif ($time == 'Weekly'){
              
               $sales = array();
            $date = array();
            for ($i=1; $i <8 ; $i++) {
                // $total = $this->db->where(array('date' => date('Y-m-d', strtotime(' -'.$i.' day')),'delivery_status' => 'Delivered','status'=>0))->select_sum('price')->get('sale')->row('price');
                $total = DB::table('invoices')
                ->where('created_at','=',date('Y-m-d', strtotime(' -'.$i.' day')))
                ->where('delete_status','=','1')
               ->sum('total');
             if ($total > 0) {
                 
              $sales[] = (float)$total; 
             }else{
               
              $sales[] =   0;  
             }
                 $date[] = date('Y-m-d', strtotime(' -'.$i.' day'));
            }
            $month = $date;
            echo json_encode(array('sales' => $sales,'month'=>$month));
            
        }
       
     }
}
