<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Section;

class Grade extends Model
{
    protected $fillable =[
    	'name',
    ];

    public function section()
	{
		return $this->hasMany('App\Section');
	}
}
