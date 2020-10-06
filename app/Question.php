<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

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
    
    public function scopeSelected($query)
    {
        return $query->where('selected', 1);
    }

    public function scopeLocale($query)
    {
        return $query->where('language', app()->getLocale());
    }

    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function getByCategory($categoryId)
    {
        $locale = Session::get('APP_LOCALE');
        return Question::where('status', 'active')
        ->where('language', $locale)
        ->where('category_id', $categoryId)
        ->orderBy('created_at', 'DESC')
        ->paginate(15);
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
