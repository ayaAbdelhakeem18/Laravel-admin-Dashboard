<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderShippingAddressController extends Controller
{
    //
    protected $fillable=['customerId','city','state','address','zip_code'];
}
