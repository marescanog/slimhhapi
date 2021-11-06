<?php

namespace App\Models;

class GuestEntry 
{

    protected $table="guest_entry";
    
    protected $fillable = ["full_name","email","comment"];
    
}