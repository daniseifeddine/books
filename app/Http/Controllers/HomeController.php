<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Book;
use App\Models\Contacts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class HomeController extends BaseController
{
    public function home()
    {
        if (auth()->check()) {
            $userData = auth()->user();
            $randomBooks = Book::inRandomOrder()->take(20)->get();
            return view('home', [
                'data' => $userData,
                'books' => $randomBooks
            ]);
        } else {
            return view('home');
        }
    }


    // Register function (REGISTER LOGIC)

    public function register(RegisterRequest $request)
    {

        $hashedPassword = Hash::make(GetDataFromRequest($request, 'password'));

        $data['name'] = $this->GetDataFromRequest($request, 'name');
        $data['email'] = $this->GetDataFromRequest($request, 'email');
        $data['password'] = $hashedPassword;

        $this->Create_Update_Delete(new User(), null, 'create', $data);


        $this->attemptAuthentication($request);

        return $this->RedirectWithMessage('home', 'success', 'login successfuly');
    }

    // end (REGISTER LOGIC)


    // login function (LOGIN LOGIC)

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        // $user = $this->SelectWhere(User::class, 'email', $credentials['email']);
        $user = $this->Get_cols_where_first(User::class, 'id', 'ASC', ['email' => $credentials['email']]);

        if ($user->active === 'inactive') {
            return $this->RedirectWithMessage('home', 'inactive', 'Your account is inactive. Contact the administrator.');
        }

        if ($this->attemptAuthentication($request)) {
            return $this->RedirectWithMessage('home', 'success', 'login successfuly');
        } else {
            return $this->RedirectWithMessage("home", 'fail', 'Invalid email or password');
        }
    }

    // end (LOGIN LOGIC)


    // logout

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    // end logout



    // contact form function (CONTACT LOGIC)

    function Contact_Form(ContactRequest $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'subject' => $this->GetDataFromRequest($request, 'subject'),
            'message' => $this->GetDataFromRequest($request, 'message'),
        ];

        $this->Create_Update_Delete(new Contacts(), null, 'create', $data);
        return $this->RedirectWithMessage('home', 'sent', '');
    }

    // end (CONTACT LOGIC)
}
