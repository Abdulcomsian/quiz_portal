<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }      

    public function create()
    {
        return view('admin.category.add');
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name'=>'required', 
            'category_slug'=>'required|unique:categories,name,'.$request->id,
        ]);
        try {
        $category= new Category;
        $category->name = $request->name;
        $category->category_slug = $request->category_slug;
        $category->save();
            toastSuccess('Successfully Added');
            return redirect('admin/category');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::where('id',$id)->first();
            return view('admin.category.edit', compact('category'));
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
            // 'category_slug'=>'required|unique:categories,category_slug,'. $request->id .'id',
        ]);
        try {
        $category= Category::find($request->category_id);
        $category->name = $request->name;
        $category->category_slug = $request->category_slug;
        $category->save();
        toastSuccess('Successfully Update');
        return redirect('admin/category');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError("Kindly fill all fields");
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            Category::FindorFail($id)->delete();
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }
}
