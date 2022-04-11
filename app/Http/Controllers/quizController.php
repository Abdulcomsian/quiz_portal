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
    public function question_select()
    {
        $quizzes = Quiz::get(); 
        $chk = count($quizzes);
        $chk = $chk / 20 ;

        return view('quiz.question_select', compact('quizzes','chk'));
        
    } 

    public function index(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'number'=>'required', 
        ]);
        if($request->number == 'all')
        {
            $quizzes = Quiz::get();
        }
        else
        {
            $quizzes = Quiz::take($request->number)->get();
        }
        $count_time = count($quizzes);
        $time = $count_time/2;
        if($count_time%2==0)
        {
            // $quizzes = Quiz::inRandomOrder()->get(); 
            $user_id = Auth::id();
            $min = $time;
            $sec = '00';
            return view('quiz.index_1', compact('quizzes','min','sec'));
        }
        else
        {
            // $quizzes = Quiz::inRandomOrder()->get(); 
            $user_id = Auth::id();
            $min = (int)$time;
            $sec = '30';
            return view('quiz.index_1', compact('quizzes','min','sec'));
        }
        // $time = $time * 20;
        
        
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
          
            $questions['question_'.$i.''] =$request->questions[$j];
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
        $result->save();

        return view('quiz.result', compact('results','total_question')); 
    }

    public function q_result()
    {
        $user_id = Auth::id();
        $results = Result::where('user_id',$user_id)->paginate(20);
        return view('quiz.results', compact('results')); 
    }

    public function q_review($id){
        $user_id = Auth::id();
        $results = Result::where(['id'=>$id,'user_id'=> $user_id])->first();
        return view('quiz.review', compact('results','id'));
    }
}
