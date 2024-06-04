<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Redirect;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials    = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $user           = User::where('username', $request->username)->first();

            return Redirect::intended('/order')
                        ->withSuccess('Signed in');
            
        }
  
        return Redirect::back()->withErrors(['msg' => 'Invalid Username or Password']);
    }

    public function forgotPassword(){
        return view('pages.forgot_password.index');
    }

    public function requestNewPassword(Request $request){

        $user     = User::where('email', $request->email)->first();

        $email = $request->email;
        $email_content = array(
            'link' => 'https://dev-beautyguild.indigo21.com/resetPassword/' . $user->id
        );

        // dd($email_content);

        Mail::send(('/emailTemplates.requestNewPassword'), $email_content,function($message) use ($email) {
            $message->to($email, 'user_name')
            ->subject('Request for Reset Password');
        });

        // return Response::json($email);
        return redirect('/login');

        // dd($user->id);

    }

    public function requestPasswordTemplate(){

        return view('emailTemplates.requestNewPassword');
    }


    public function resetPassword(String $id){       

        $user     = User::where('id', $id)->first();

        // dd($user->email);
        return view('pages.forgot_password.resetPassword')
                ->withUser($user);
    }

    public function recoverPassword(String $id , Request $request){

        $request['updated_by'] = $id;

        User::find($id)->update($request->all());
        

        return redirect('/login');

        // dd($id);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
