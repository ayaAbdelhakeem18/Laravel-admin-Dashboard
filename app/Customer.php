<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['id',"userId","firstName","lastName","phone","city","state","address","zip_code",'created_at','updated_at'];
}
