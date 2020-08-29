<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded = ['id'];

    public function scopeLatestAnsweredQuestions($query)
    {
        return $query->
                    Answered()->
                    addSelect(['answered_at' => Answer::select('created_at')->
                            whereColumn('answers.question_id', 'questions.id')->
                            latest()->
                            take(1)
                        ])->
                        withCasts(['answered_at' => 'datetime'])->
                        orderByDesc('answered_at');
    }

    public function scopeAnswered($query)
    {
        return $query->where('is_answered', 1);
    }

    public function scopeLocale($query)
    {
        return $query->where('language', app()->getLocale());
    }

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
