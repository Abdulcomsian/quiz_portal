<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        return view('admin.course.index', compact('courses'));
    }      

    public function create()
    {
        return view('admin.course.add');
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name'=>'required', 
            'course_slug'=>'required|unique:courses,name,'.$request->id,
        ]);
        try {
        $course= new Course;
        $course->name = $request->name;
        $course->course_slug = $request->course_slug;
        $course->save();
            toastSuccess('Successfully Added');
            return redirect('admin/course');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $course = Course::where('id',$id)->first();
            return view('admin.course.edit', compact('course'));
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
        ]);
        try {
        $course= Course::find($request->course_id);
        $course->name = $request->name;
        $course->course_slug = $request->course_slug;
        $course->save();
        toastSuccess('Successfully Update');
        return redirect('admin/course');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError("Kindly fill all fields");
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            Course::FindorFail($id)->delete();
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
