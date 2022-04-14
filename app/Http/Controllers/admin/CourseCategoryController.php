<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use Auth;
use Illuminate\Support\Facades\Redirect;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $course_categories = CourseCategory::get();
        return view('admin.course_category.index', compact('course_categories'));
    }      

    public function create()
    {
        $courses = Course::get();
        return view('admin.course_category.add',compact('courses'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name'=>'required', 
            'course_id'=>'required', 
            'category_slug'=>'required|unique:courses,name,'.$request->id,
        ]);
        try {
        $course_category= new CourseCategory;
        $course_category->name = $request->name;
        $course_category->category_slug = $request->category_slug;
        $course_category->course_id = $request->course_id;
        $course_category->save();
            toastSuccess('Successfully Added');
            return redirect('admin/course-category');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $course_category = CourseCategory::where('id',$id)->first();
            $courses = Course::get();
            return view('admin.course_category.edit', compact('course_category','courses'));
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
            'course_id' => 'required',
        ]);
        try {
        $course_category= CourseCategory::find($request->id);
        $course_category->name = $request->name;
        $course_category->category_slug = $request->category_slug;
        $course_category->course_id = $request->course_id;
        $course_category->save();
        toastSuccess('Successfully Update');
        return redirect('admin/course-category');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            CourseCategory::FindorFail($id)->delete();
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
