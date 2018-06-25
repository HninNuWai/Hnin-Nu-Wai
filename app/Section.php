<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;

class Section extends Model
{
    protected $fillable =[
    	'name','grade_id',
    ];

    public function grade(){
		return $this->belongsTo('App\Grade');
	}
}
