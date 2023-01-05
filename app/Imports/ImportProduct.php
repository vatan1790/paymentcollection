<?php


namespace App\Imports;


use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Auth;
use DB;
class ImportProduct implements  ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {
 
        foreach ($rows as $row)
        {
           $dd = json_decode($row);
           if(isset($dd->product)){
            $result =    array(
                        'pro'       => $dd->product,
                        'qty'       => $dd->quantity,
                    );
            DB::table('temptable')->insert($result);
           }
 
           
        }
    }

}

