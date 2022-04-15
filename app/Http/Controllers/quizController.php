<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Category;
use App\Models\Lesson;  
use App\Models\CourseCategory;  
use App\Models\Course;  
use Auth;
use DB;

class quizController extends Controller
{
    public function question_select($cat_id)
    {
        $category = Category::where('name',$cat_id)->first();
        $quizzes = Quiz::where('category_id',$category->id)->get(); 
        $chk = count($quizzes);
        $chk = $chk / 20 ;

        return view('quiz.question_select', compact('quizzes','chk','category'));
        
    }   

    public function category_select()
    {
        $quizzes = Quiz::get(); 
        $categories = Category::get();
        $chk = count($quizzes);
        $chk = $chk / 20 ;

        return view('quiz.state_select', compact('categories','quizzes','chk'));
        
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'number'=>'required', 
        ]);
        $quiz_type = $request->quiz_type;
        $category = Category::where('name',$request->category)->first();
        $category_id = $category->id;
        if($request->category)
        {
            $quizzes = Quiz::where('category_id', $category_id)->get();
            
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
            if(count($quizzes) > 0)
            {
                return view('quiz.index_1', compact('quizzes','min','sec','quiz_type','category_id'));

            }
            else
            {
                toastError('No Question Found');
                return Redirect::back();
            }
            
        }
        else
        {
            // $quizzes = Quiz::inRandomOrder()->get(); 
            $user_id = Auth::id();
            $min = (int)$time;
            $sec = '30';
            if(count($quizzes) > 0)
            {
                return view('quiz.index_1', compact('quizzes','min','sec','quiz_type','category_id'));
            }
            else
            {
                toastError('No Question Found');
                return Redirect::back();
            }
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
        $result->quiz_type = $request->quiz_type;
        $result->category_id = $request->category_id;
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

    public function over_view(){
        return view('quiz.interactive_quiz');
    } 

    public function wc(){
        return view('quiz.wc');
    } 

    public function remain_command(){
        return view('quiz.remaining_command');
    } 

    public function course(){
        $courses = Course::get();
        return view('quiz.course',compact('courses'));
    }   

    public function course_category($course_slug){
        $course = Course::where('course_slug',$course_slug)->first();
        $lessons = Lesson::where('course_id',$course->id)->get();
        return view('quiz.course_category',compact('lessons','course'));
    }

    public function get_category($id){
        // echo json_encode(DB::table('sub_categories')->where('category_id', $id)->get());
        echo json_encode(DB::table('course_categories')->where('course_id', $id)->get());
    }

    
}
