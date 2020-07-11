<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded = ['id'];

    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    public function answer_bn()
    {
    	return $this->hasOne('App\Answer')->where('language', 'bn');
    }
    public function answer_en()
    {
    	return $this->hasOne('App\Answer')->where('language', 'en');
    }
    public function answer_ar()
    {
    	return $this->hasOne('App\Answer')->where('language', 'ar');
    }
}
