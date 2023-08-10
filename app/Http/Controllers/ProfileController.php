<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PrivacyCheckBoxRequest;
use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Models\UserPrivacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    function profile()
    {
        return $this->authRedirectWithData('profile', 'data', 'home');
    }


    // setting page function (SETTING PAGE)

    function settings()
    {
        return $this->authRedirectWithData('Settings', 'data', 'home');
    }

    // end (SETTING PAGE)


    // update image in setting page function (UPDATE IMAGE IN SETTING IF EXISTS)

    function Update_Image(ImageRequest $request)
    {
        $this->USER_CHANGE_IMAGE($request, 'image', 'ProfileImage', 'uploads');
        return $this->RedirectWithMessage('Settings', 'success', 'Image changed');
    }

    // end (UPDATE IMAGE IN SETTING IF EXISTS)


    // remove image in setting page function (UPDATE IMAGE IN SETTING IF DOES NOT EXISTS)

    function Remove_Image()
    {
        $this->USER_REMOVE_IMAGE('ProfileImage', 'uploads');
        return $this->RedirectWithMessage('Settings', 'success', 'Image removed');
    }

    // end (UPDATE IMAGE IN SETTING IF DOES NOT EXISTS)


    // change password function (CHANGE PASSWORD LOGIC)

    function change_password(PasswordRequest $request)
    {

        $old_password = $this->GetDataFromRequest($request, 'old_password');
        $new_password = $this->GetDataFromRequest($request, 'new_password');
        $confirm_password = $this->GetDataFromRequest($request, 'confirm_password');


        $user = Auth::user();

        if ($this->CHECK_OLD_PASSWORD($old_password)) {
            return $this->RedirectWithMessage('Settings', 'old_password', 'old_password');
        } elseif ($this->CHECK_NEW_CONFIRMED_PASSWORD($new_password, $confirm_password)) {
            return $this->RedirectWithMessage('Settings', 'failed_change_password', 'failed_change_password');
        }
        // Update the user's password
        $dataToUpdate = [
            'password' => Hash::make($new_password),
        ];

        $this->Create_Update_Delete(User::class, ['id' => $user->id], 'update', $dataToUpdate);

        // $user->password = $new_password;
        // $user->save();

        return $this->RedirectWithMessage("Settings", 'success', 'Password changed');
    }

    // end (CHANGE PASSWORD LOGIC)


    // update user information function (UPDATE USER INFORMATION)

    function user_info(UserInfoRequest $request)
    {

        $user = Auth::user();

        $data = [
            "language"            => GetDataFromRequest($request, 'language'),
            "country"             => GetDataFromRequest($request, 'country'),
            "city"                => GetDataFromRequest($request, 'city'),
            "phone"               => GetDataFromRequest($request, 'phone'),
            "birthday"            => GetDataFromRequest($request, 'birthday'),
            "gender"              => GetDataFromRequest($request, 'gender'),
            "description"         => GetDataFromRequest($request, 'description'),
            "age"                 => GetDataFromRequest($request, 'age'),
            "fav_author"          => GetDataFromRequest($request, 'fav_author'),
            "favorite_book_genre" => GetDataFromRequest($request, 'favorite_book_genre'),
            "worst_book"          => GetDataFromRequest($request, 'worst_book'),
            "fav_book"           =>  GetDataFromRequest($request, 'fav_book')
        ];

        Create_Update_Delete(User::class, ['id' => $user->id], 'update', $data);

        return RedirectWithMessage('Settings', 'success', 'inforamtion saved');
    }
    // end (UPDATE USER INFORMATION)


    // update user privacy options (UPDATE PRIVACY OPTION)

    function privacy(PrivacyCheckBoxRequest $request)
    {
        $dataUpdate = [
            'show_language'            => $request->boolean('checkbox_language'),
            'show_country'             => $request->boolean('checkbox_country'),
            'show_city'                => $request->boolean('checkbox_city'),
            'show_phone'               => $request->boolean('checkbox_phone'),
            'show_birthday'            => $request->boolean('checkbox_birthday'),
            'show_gender'              => $request->boolean('checkbox_gender'),
            'show_fav_auth'            => $request->boolean('checkbox_fav_auth'),
            'show_favorite_book_genre' => $request->boolean('checkbox_favorite_book_genre'),
            'show_worst_book'          => $request->boolean('checkbox_worst_book'),
            'show_fav_book'            => $request->boolean('checkbox_fav_book'),
            'show_description'         => $request->boolean('checkbox_description'),
        ];

        $user = Auth::user();

        Create_Update_Delete(UserPrivacy::class, ['id' => $user->id], 'update', $dataUpdate);

        return RedirectWithMessage('Settings', 'success', 'Information updated');
    }

    // end (UPDATE PRIVACY OPTION)
}
