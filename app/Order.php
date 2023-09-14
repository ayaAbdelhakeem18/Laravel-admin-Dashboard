<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=['id',"customer_Id","TotalPrice","TotalAmount","status",'created_at','updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
