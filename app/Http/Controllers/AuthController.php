<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // public function Register(RegisterRequest $request)
    // {
    //     $incomingFields = $request->validated();
    //     $incomingFields['password'] = bcrypt($incomingFields['password']);

    //     // Find the role by its name
    //     $role = Role::where('name', $incomingFields['role'])->first();


    //     $user = User::create($incomingFields);

    //     $user->role()->attach($role->id);

    //     auth()->login($user);

    //     return redirect('/home');
    // }

    public function Register(RegisterRequest $request)
    {
        $incomingFields = $request->validated();
        $incomingFields['password'] = bcrypt($incomingFields['password']);
    
        // Trouver le rôle par son nom
        $role = Role::where('name', $incomingFields['role'])->first();
    
        if (!$role) {
            // Si le rôle n'est pas trouvé, retournez avec un message d'erreur
            return back()->withInput()->with('error', 'Role not found');
        }
    
        // Créer un nouvel utilisateur
        $user = User::create($incomingFields);
    
        if (!$user) {
            // Si la création de l'utilisateur échoue, retournez avec un message d'erreur
            return back()->withInput()->with('error', 'Failed to create user');
        }
    
        // Attacher le rôle à l'utilisateur
        $user->roles()->attach($role->id);
    
        // Connexion de l'utilisateur après son inscription
        auth()->login($user);
    
        // Rediriger vers la page d'accueil avec un message de succès
        return redirect('/home')->with('success', 'Registration successful');
    }
    
    public function Login(Request $loginRequest)
    {
        $incomingFields = $loginRequest->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $loginRequest->session()->regenerate();
            $user = auth()->user();
            $roles = $user->roles()->pluck('name')->toArray();
                return redirect('/home');
        }
        return back()->withInput($loginRequest->only('email'))->with('error', 'Invalid credentials');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Password
    // reset password email
    public function ForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $token = Str::random(64);

        $existingEntry = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$existingEntry) {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }
        // dd($request);
        Mail::send('pages.email.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset your password');
        });
        return view('pages.authentification.login')->with("success", "we have send email");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'password_confirm' => 'required|same:password',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            auth()->login($user);
            return redirect('/home')->with('status', 'Your password has been reset!');
        } else {
            return redirect('/auth')->with('status', 'Your password has been reset!');
        }
    }
}
