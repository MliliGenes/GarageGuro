<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function signup()
    {
        return view('pages.auth.signup');
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->route("dashboard.stats")
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors('You have entered invalid credentials');
    }

    public function signup_post(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect()->back()->withErrors("User already exists")->withInput();
        }

        $data = $request->all();

        $createUser = $this->create($data);


        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);

        Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        return redirect("/login")->withSuccess('Great! You have Successfully loggedin');

        // dd($tokenRecord);
    }

    public function create(array $data)
    {
        return User::create([
            'firstName' => $data['first_name'],
            'lastName' => $data['last_name'],
            'phoneNumber' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }


    public function deleteClient(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->withSuccess('User deleted successfully');
    }


    public function updataeClient(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $validated = $request->validate([
            'password' => 'required|min:8',
            'email' => 'required|email',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $data["password"] = Hash::make($data["password"]);
        $user = User::find($id);
        $user->update($data);
        return redirect()->back()->withSuccess('User updated successfully');
    }

    public function getClient($id)
    {
        $user = User::find($id);
        return $user;
    }


    public function addNewClient(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }
        ;

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect()->back()->withErrors("User already exists")->withInput();
        }

        $data = $request->all();
        $data["password"] = Hash::make($data["password"]);
        $createUser = $this->create($data);
        return redirect()->route('dashboard.clients')->withSuccess('User created successfully');
    }
}