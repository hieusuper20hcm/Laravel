<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Users;
use PhpParser\Node\Stmt\Global_;

class UserController extends Controller
{
    public function index(){
        $users= Users::all();
        return view('users/index',['users'=>$users]);
    }
    public function create(){
        return view('users/create');
    }
    public function postCreate(Request $request){
        $error=array('name'=>'','phone'=>'','email'=>'','password'=>'');
        $user=Users::where('email',$request->email)->first();
        
        // if($request->hasFile('img')){
        //     $nameupload = time() . '.' . $request->file('img')->getClientOriginalExtension();
        //     $request->file('img')->move('img',$nameupload);
        // }else{
        //     $nameupload='default.png';
        // }
        
        if(empty($request->name)){
           $error['name']='Name is not required';
        }else if(!preg_match('/^\b[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ ]+.{3}$/',trim($request->name))){
            $error['name']='Name is wrong format(At least 3 letters alphabet)';
        }
        
        if(empty($request->phone)){
            $error['phone']='Phone is not required';
        }else if(!preg_match('/^0(?=.+[0-9]).{9}$/',trim($request->phone))){
            $error['phone']='Phone is wrong format';
        }

        if(empty($request->phone)){
            $error['phone']='Phone is not required';
        }else if(!preg_match('/^0(?=.+[0-9]).{9}$/',trim($request->phone))){
            $error['phone']='Phone is wrong format';
        }

        if(empty($request->email)){
            $error['email']='Email is not required';
        }else if($user){
            $error['email']='Email is existed';
        }

        if(empty($request->password)){
            $error['password']='Password is not required';
        }
        if(array_filter($error)){
            return view('users/create',[
                'values'=>$request,
                'error'=>$error
            ]);
        }else{
            $users = new Users();
            $users->name = $request->name;
            $users->phone = $request->phone;
            $users->email = $request->email;
            $users->password = $request->password;
            //$users->avatar= $nameupload;
            $users ->save();
            return redirect('users')->with('messeger','Thêm thành công');
        }      
    }
    public function search(Request $request){ 
        // $q=strtolower($request->q);
        // //strpos(strtolower($users->name),$q)!=-1;  
        // $users= array(Users::all());
        // $matchUsers=array_filter($users,function($users,$q){
        //     //error_log($users);
        //     strpos(strtolower($users->name),$q)!=-1; 
        // });
        // return view('users/index',['users'=>$matchUsers]);
    }
    public function view($id){
        $user= Users::find($id);
        return view('users/view',['user'=>$user]);
    }
    public function delete($id){
        Users::find($id)->delete();
        return response()->json();
    }
        
}
