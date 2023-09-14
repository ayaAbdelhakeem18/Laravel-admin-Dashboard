<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    protected $fillable=['orderId','paymentAmount','paymentMethod'];
}
