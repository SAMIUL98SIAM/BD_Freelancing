<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserRequest;
use App\Models\user;

class LoginController extends Controller
{
        public function index()
        {
                 return view('login.index');
        }

        public function regverify(){
        return redirect('/login');
        }

        public function verify(userRequest $req)
        {
                $req->validate([
                        'username' => 'required',
                        'password'=> 'required|min:5',
                    ]);
            
                    //Admin Authentication
            
            
                    $userInfo = User::where('username','=',$req->username)->where('type','=','1')->first();
                    $managerInfo = User::where('username','=',$req->username)->where('type','=','2')->first();
                    $buyerInfo = User::where('username','=',$req->username)->where('type','=','3')->first();
                    $sellerInfo = User::where('username','=',$req->username)->where('type','=','4')->first();
                    if(!$userInfo && !$managerInfo && $buyerInfo && $sellerInfo)
                    {
                        return back()->with('fail','We do not recognize your email address');
                    }
                    else
                    {
                        if($userInfo)
                        {
                            if((Hash::check($req->password,$userInfo->password)))
                            {
                                $req->session()->put('users',$userInfo->id);
                                return redirect('/admin');
                            }
                            else
                            {
                                return back()->with('fail','Incorrect password');
                            }
                        }
                        elseif($managerInfo){
                            if((Hash::check($req->password,$managerInfo->password)))
                            {
                                $req->session()->put('users',$managerInfo->id);
                                return redirect('/manager');
                            }
                            else
                            {
                                return back()->with('fail','Incorrect password');
                            }
                        }
                        elseif($buyerInfo){
                            if((Hash::check($req->password,$buyerInfo->password)))
                            {
                                $req->session()->put('users',$buyerInfo->id);
                                return redirect('/buyer');
                            }
                            else
                            {
                                return back()->with('fail','Incorrect password');
                            }
                        }
            
                    }
            
                   
                // $validation = Validator::make($req->all(), [
                // 'username' => 'required',
                // 'password'=> 'required|min:5'
                // ]);
                // $user = User::where('username', $req->username)
                // ->where('password', $req->password)
                // ->where('type', $req->type)
                // ->first();
                // if($user['type'] =='1' && $user['active']=='1' ){
                // $req->session()->put('username', $req->username);
                // $req->session()->put('type', $req->type);
                // $req->session()->put('id', $user->id);
                // return redirect('/admin');
                // }
                // elseif($user['type'] =='2' && $user['active']=='1'){
                // $req->session()->put('username', $req->username);
                // $req->session()->put('type', $req->type);
                // $req->session()->put('id', $user->id);
                // return redirect('/manager');
                // }
                // elseif($user['type'] =='3'  && $user['active']=='1'){
                // $req->session()->put('username', $req->username);
                // $req->session()->put('type', $req->type);
                // $req->session()->put('id', $user->id);
                // return redirect('/Buyer');
                // }
                // elseif($user['type'] =='4'  && $user['active']=='1'){
                // $req->session()->put('username', $req->username);
                // $req->session()->put('type', $req->type);
                // $req->session()->put('id', $user->id);
                // return redirect('/sellerHome');
                // }
                // else
                // {
                //  $req->session()->flash('msg', 'invaild username or password');
                //   return redirect('/login');
                // }
        }
}