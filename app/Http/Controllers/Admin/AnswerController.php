<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer',
            'lang' => 'required',
        ]);
        $question = Question::findOrFail($request->question_id);
        $question->is_answered = 1;
        $question->save();
        $answer = Answer::where('question_id', $request->question_id)->get();

        if($answer){
            $answerByLang = Answer::where('question_id', $request->question_id)->where('language', $request->lang)->first();
            if($answerByLang){
                return $this->updateAns($request, $answerByLang);
            }
            else{
                $newAns = $this->createAnsWithBatch($request, $answer[0]->batch_id);
                return $this->updateAns($request, $newAns);
            }
        }else{
            $rand = rand(2, 20000).time();
            $newAns = $this->createAnsWithBatch($request, $rand);
            return $this->updateAns($request, $newAns);
        }
    }

    public function changeStatus($status, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->status = $status;
        return $answer->save();
    }

    private function updateAns($request, $answer)
    {
        $answer->title = $request->answer_title;
        $answer->description = $request->answer;
        $answer->question = $request->question;
        $answer->question_title = $request->question_title;
        $answer->updated_by = auth()->id();
        $answer->tag = $request->tag;
        $answer->status = 'pending';
        return $answer->save();
    }

    private function createAnsWithBatch($request, $batchId)
    {
        $answer = new Answer;
        $answer->language = $request->lang;
        $answer->question_id = $request->question_id;
        $answer->batch_id = $batchId;
        $answer->save();
        return $answer;
    }
}
