<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'string', 'min:11'],
            'class_room_name' => ['required', 'string', 'uppercase', 'min:4'],
            'profile_image' => ['nullable','image' ,'mimes:png,jpg,jpeg,webp'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        try{
            if($request->has('profile_image') && $request->file('profile_image') != null){
                $file = $request->file('profile_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $path = $file->storeAs('public/uploads/profile_image', $filename);
                $url = Storage::url($path);
            }else{
                $url = null;
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'profile_image' => $url,
                'class_room_name' => $request->class_room_name,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);
        }catch (Exception $e){
            return redirect()->back()->withInput($request->input())->with('error', $e);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
