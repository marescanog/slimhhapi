<?php

namespace App\Models;

// use \Illuminate\Database\Eloquent\Model;

class GuestEntry 
{

    protected $table="guest_entry";
    
    protected $fillable = ["full_name","email","comment"];
    
}