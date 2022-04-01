<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $users = User::role('User')->get(); 
        if($users)
        {
            return view('admin.user.users', compact('users'));
        }
        else{
            toastError('No User Created Yet');
            return Redirect::back();
        }
    }      

    public function create()
    {
        return view('admin.user.add-user');
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name'=>'required|string|max:255', 
            'phone'=>'required|min:9|max:16', 
            'password'=>'required|string|min:8|confirmed', 
            'email'=>'required|string|email|max:255|unique:users',
        ]);
        try {
        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = '1';
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole('User');
            toastSuccess('Successfully Added');
            return redirect('admin/user');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $user = User::where('id',$id)->first();
            return view('admin.user.edit-user', compact('user'));
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
    }   

    public function update(Request $request)
    {
        // dd($request);
        if($request->password != null)
        {
           $this->validate($request,[ 
                'name'=>'required|string|max:255', 
                'phone'=>'required|min:9|max:16', 
                'password'=>'required|string|min:8|confirmed', 
            ]); 
        }
        else
        {

            $this->validate($request,[ 
                'name'=>'required|string|max:255', 
                'phone'=>'required|min:9|max:16', 
            ]);
        }
        try {
            $user= User::find($request->id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->status = '1';
            if($request->password != null)
            {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            toastSuccess('Successfully Update');
            return redirect('admin/user');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        try {
            User::FindorFail($id)->delete();
            toastr()->success('Successfully Deleted');
            return back();
        } catch (\Exception $exception) {
            
                toastError("Something went wrong");
                // toastError($exception->getMessage());
                return Redirect::back();
        }
    }

    public function update_status(Request $request,$id)
    {
        // dd($id);
        try {
        $user= User::find($id);
        $user->status = $request->status;
        $user->save();
        toastSuccess('Successfully Update Status');
        return redirect('admin/user');
        
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
}
