<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
    	'name',
    	'father_name',
    	'phone_no',
    	'address',
    	'grade',
    	'section',
    ];

    
}
