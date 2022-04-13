<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Category;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class QuizController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $quizzes = Quiz::get(); 
        return view('admin.quiz.quiz', compact('quizzes'));
        
    }      

    public function create()
    {
        $categories = Category::get();
        return view('admin.quiz.add',compact('categories'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'category_id'=>'required', 
            'question'=>'required', 
            'answer'=>'required', 
            'option_1'=>'required', 
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'image'=>'required',
            'm_image'=>'required',
        ]);
        try {
            $quiz= new Quiz;
            $quiz->question = $request->question;
            $quiz->answer = $request->answer;
            $quiz->option_1 = $request->option_1;
            $quiz->option_2 = $request->option_2;
            $quiz->option_3 = $request->option_3;
            $quiz->option_4 = $request->option_4;
            $quiz->category_id = $request->category_id;
            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('question/image/',$image_name);
                $quiz->image=$image_name;
            }
            if($request->hasfile('image'))
            {
                $image = $request->file('m_image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('question/m_image/',$image_name);
                $quiz->m_image=$image_name;
            }

            $quiz->save();
            toastSuccess('Successfully Added');
            return redirect('admin/quiz');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $quiz = Quiz::where('id',$id)->first();
            $categories = Category::get();
            return view('admin.quiz.edit', compact('quiz','categories'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }   

    public function update(Request $request)
    {
        // dd($request);
        
       $this->validate($request,[ 
            'question'=>'required', 
            'answer'=>'required', 
            'option_1'=>'required', 
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required', 
        ]); 
        
        try {
            $quiz= Quiz::find($request->id);
            $quiz->question = $request->question;
            $quiz->answer = $request->answer;
            $quiz->option_1 = $request->option_1;
            $quiz->option_2 = $request->option_2;
            $quiz->option_3 = $request->option_3;
            $quiz->option_4 = $request->option_4;
            if($request->hasfile('image') && $request->file('image'))
            {
                $image = $request->file('image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('question/image/',$image_name);
                $quiz->image=$image_name;
            }
            if($request->hasfile('image') && $request->file('m_image'))
            {
                $image = $request->file('m_image');
                $extensions =$image->extension();

                $image_name =time().'.'. $extensions;
                $image->move('question/m_image/',$image_name);
                $quiz->m_image=$image_name;
            }
            $quiz->save();
            toastSuccess('Successfully Update');
            return redirect('admin/quiz');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            Quiz::FindorFail($id)->delete();
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            
                toastError("Something went wrong");
                // toastError($exception->getMessage());
                return Redirect::back();
        }
    }
}
