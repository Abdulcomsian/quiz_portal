<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Result;
use Auth;

class quizController extends Controller
{
    public function index()
    {
        // $quizzes = Quiz::inRandomOrder()->get(); 
        $user_id = Auth::id();
        $quizzes = Quiz::get(); 
        return view('quiz.index_1', compact('quizzes'));
        
    } 

    public function store_quiz(Request $request)
    {
        $user_id = Auth::id();
        $questions = [];
        $answers = [];
        $c_answers = [];

          $j = 0;
          $results=0;
        $total_question = count($request->question);
        for($i=1; $i<= count($request->question); $i++)
        {
          
            $questions['question_'.$i.''] =$request->question[$j];
            $answers['option_'.$i.''] =$request->input('option_'.$i);
            $c_answer = Quiz::FindorFail(($request->question[$j]));
            $c_answer =  $c_answer->answer;
            if($c_answer==$request->input('option_'.$i))
            {
                $results++;
            }
            $c_answers['answer_'.$i.''] =  $c_answer;
            $j++;
        }
        $result= new Result;
        $result->questions = $questions;

        $result->answer = $answers;
        $result->c_answer = $c_answers;
        $result->user_id = $user_id;

        $result->result = $results;
        // dd($result);
        $result->save();

        return view('quiz.result', compact('results','total_question')); 
    }

    public function q_result()
    {
        $user_id = Auth::id();
        $results = Result::where('user_id',$user_id)->get();
        return view('quiz.results', compact('results')); 
    }
}
