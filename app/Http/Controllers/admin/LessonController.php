<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Lesson;
use Auth;
use Illuminate\Support\Facades\Redirect;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::get();
        return view('admin.lesson.index', compact('lessons'));
    }      

    public function create()
    {
        $courses = Course::get();
        $course_categories = CourseCategory::get();
        return view('admin.lesson.add',compact('courses','course_categories'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[ 
            'name'=>'required', 
            'course_id'=>'required', 
            'category_id'=>'required', 
            'document'=>'required',
        ]);
        try {
        $lesson= new Lesson;
        $lesson->name = $request->name;
        $lesson->category_id = $request->category_id;
        $lesson->course_id = $request->course_id;
        if($request->hasfile('document'))
        {
            $image = $request->file('document');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lesson/document/',$image_name);
            $lesson->document=$image_name;
        }
        $lesson->save();
            toastSuccess('Successfully Added');
            return redirect('admin/course-lesson');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $lesson = Lesson::where('id',$id)->first();
            $courses = Course::get();
            $course_categories = CourseCategory::get();
            return view('admin.lesson.edit', compact('lesson','courses','course_categories'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function update(Request $request)
    {
         // dd($request);
        $this->validate($request,[ 
            'name'=>'required', 
            'course_id'=>'required', 
            'category_id'=>'required',
        ]);
        try {
        $lesson= Lesson::find($request->id);
        $lesson->name = $request->name;
        $lesson->category_id = $request->category_id;
        $lesson->course_id = $request->course_id;
        if($request->hasfile('document'))
        {
            $image = $request->file('document');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('lesson/document/',$image_name);
            $lesson->document=$image_name;
        }
        $lesson->save();
        toastSuccess('Successfully Update');
        return redirect('admin/course-lesson');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            $filePath = Lesson::FindorFail($id);
            Lesson::FindorFail($id)->delete();
            @unlink('lesson/document/',$filePath->image);
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
