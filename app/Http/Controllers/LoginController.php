<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Mail\UserForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    public function academic()
    {
        return view('back-end.add-academic-form');
    }

    public function login(Request $request)
    {

        // echo "testing";
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // $user = $request->validated();
        // dd($user);
        // dump($user);

        if (Auth::attempt($validation))
        {
            $user = Auth::user();
            Session::put('user_id', $user->id);
            return redirect()->route('dashboard');
        } else{
            return redirect()->back()->withInput($request->only('email'))->with('message', 'Email or Password not match');
        }

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('back-end.login-form');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //
    }

    public function forgot()
    {
        return view('back-end.user-forgot');
    }

    public function mailSend(User $user, Request $request)
    {
        $data = User::where('email', $request->email)->first();
        if ($data) {
            $data->rememberToken = $request->_token;
            $data->save();
            // if ($data->wasChanged('remember_token')) {
            if ($data) {
                $token = $request->_token;
                $toMail = $request->email;
                $subject = "Subject534534534";
                Mail::to($toMail)->send(new UserForgotPasswordMail($subject, $token));
                return redirect()->route('login.form')->with('status', 'Mail sent successfully! Check Email');
            } else {
                return redirect()->back()->with('status', 'Failed to update token');
            }
        } else {
            return redirect()->back()->with('status', 'User not found');
        }
    }


    public function resetPasswordForm($token){
        return view('back-end.reset-password',['token'=>$token]);
    }

    public function updatePassword(User $user, Request $request){

        $validate   = $request->validate([
            'password' =>'required|confirmed',
        ]);
        if($validate){
            // dd($request->toArray());
            // $user =new User();
            $user  = User::where('rememberToken',$request->token)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            if($user){
                return redirect()->route('login.form')->with('message',"Password Update successfully");
            }
            else{
                return redirect()->back()->with('message',"Record NOt found");
            }
        }
        else{
            return redirect()->back()->with('message','not record Found');
        }
    }



    /**
     * Remove the specified resource from storage.
     */


    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('message', 'You have been logged out successfully.');
    }
}
