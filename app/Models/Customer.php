<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Payment;
class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',  'name',    'gender', 'contact', 'address', 'dob', 'pancard', 'aadharcard',  'amount',  'nominee', 'agent_id','account'
    ];

     public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
    
}