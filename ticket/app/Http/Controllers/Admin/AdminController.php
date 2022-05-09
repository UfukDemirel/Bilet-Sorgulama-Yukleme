<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /* @var User|Model
     */

    public $user;
    public $facultys;
    public $episode;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function student(){
        $student = User::where('permission_level','=','user')
            ->where('kind','=','1')
            ->get();
        return view('Backend.student',compact('student'));
    }

    public function studentdetails($id){
        $post = $this->user->details($id);
        return view('Backend.studentdetails',compact('post'));
    }

    public function studentdetailspost(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'number'=>'required',
            'identity'=>'required',
            'birth'=>'required',
            'email'=>'required',
            'email_verify'=>'required',
            'is_active'=>'required'
        ]);

            $post = DB::table('users')
                ->where('id','=',$id)
                ->update([
                    "name"=>$request->name,
                    "surname"=>$request->surname,
                    "gender"=>$request->gender,
                    "phone"=>$request->phone,
                    "number"=>$request->number,
                    "identity"=>$request->identity,
                    "birth"=>$request->birth,
                    "email"=>$request->email,
                    "email_verify"=>$request->email_verify,
                    "is_active"=>$request->is_active
                ]);
        if ($post){
                Alert::success('Great!', 'You are registered, you can login.');
                return redirect()->route('student',compact('post'));
        }else{
            Alert::error('Error!', 'We encountered a problem while updating.');
            return back();
        }
    }

    public function profile(){
        return view('Backend.profile');
    }

    public function profilepost(Request $request){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'identity'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
        $post = DB::table("users")
            ->where('id',Auth::id())
            ->update([
                "name"=>$request->name,
                "surname"=>$request->surname,
                "identity"=>$request->identity,
                "phone"=>$request->phone,
                "email"=>$request->email,
            ]);
        if ($post){
            Alert::success('Great!', 'profile updated..');
            return back();
        }else{
            Alert::error('Error!', 'Profile could not be updated..');
            return back();
        }
    }

    public function civilian(){
        $student = User::where('permission_level','=','user')->where('kind','=','2')->get();
        return view('Backend.civilian',compact('student'));
    }

    public function remove($id){
        $delete = DB::table('users')
            ->Delete($id);
        if ($delete){
            Alert::success('Success!', 'Delete successful...');
        }
        return back();
    }
}
