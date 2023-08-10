<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends BaseController
{

    function admin()
    {
        return $this->authRedirectWithData('admin/admin', 'data', 'home');
    }

    // --------------- USER (ON SIDEBAR) ---------------//

    function admin_user()
    {
        if (auth()->check()) {
            $data = auth()->user();
        }

        $users = $this->Get_cols_where_paginate(User::class, 'id', 'ASC', null, 10, ['*']);
        $iterationCount = ($users->currentPage() - 1) * $users->perPage();

        return view('admin/user', [
            'users' => $users,
            'data' => $data,
            'iteration' => $iterationCount
        ]);
    }

    // deactivate User function

    function deactivateUser($user_id)
    {
        $id = Crypt::decrypt($user_id);

        $data = ["active" => "inactive"];

        $this->Create_Update_Delete(User::class, ['id' => $id], 'update', $data);
        return $this->RedirectWithMessage('admin_user', 'success', 'User deactivated');
    }

    // end deactivate User function


    // activate User function

    function activateUser($user_id)
    {
        $id = Crypt::decrypt($user_id);

        $data = ["active" => "active"];

        $this->Create_Update_Delete(User::class, ['id' => $id], 'update', $data);
        return $this->RedirectWithMessage('inactiveUser', 'success', 'User activated');
    }

    // end activate User function


    // showing all inactive user in a single page (INACTIVE USER PAGE):
    function inactiveUser()
    {
        if (auth()->check()) {
            $data = auth()->user();
        }

        $users = $this->Get_cols_where_paginate(User::class, 'id', 'ASC', ["active" => 'inactive'], 10, ['*']);
        $iterationCount = ($users->currentPage() - 1) * $users->perPage();


        return view('admin/inactiveUser', [
            'users' => $users,
            'data' => $data,
            'iteration' => $iterationCount,
        ]);
    }

    // end INACTIVE USER PAGE


    // edit user function

    function editUser($id)
    {
        if (auth()->check()) {
            $data = auth()->user();
        }

        $user = $this->SelectWhere(User::class, 'id', $id);

        return view('admin/editUser', [
            'user' => $user,
            'data' => $data,
        ]);
    }

    // end edit user function


    // update image in the edit user page (IF IMAGE EXISTS)

    function Update_Image_Admin(Request $request)
    {
        $id = GetDataFromRequest($request, 'image_hidden_id');
        $image = $this->GetDataFromRequest($request, 'image');
        $filename = $this->uploadFile($image);

        $check = $this->SelectWhere(User::class, 'id', $id);
        if ($check->ProfileImage) {
            $oldImage = public_path('uploads') . '/' . $check->ProfileImage;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $dataToUpdate = ['ProfileImage' => $filename];
        Create_Update_Delete(User::class, ['id' => $id], 'update', $dataToUpdate);
        return redirect()->back()->with('success', 'Image changed');
    }

    // end (IF IMAGE EXISTS)


    // update image in the edit user page (IF there is no image)

    function Remove_Image_Admin(Request $request)
    {
        $id = GetDataFromRequest($request, 'image_hidden_id');

        $check = $this->SelectWhere(User::class, 'id', $id);
        if ($check->ProfileImage) {
            $oldImage = public_path('uploads') . '/' . $check->ProfileImage;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
        $dataToUpdate = ['ProfileImage' => null];
        Create_Update_Delete(User::class, ['id' => $id], 'update', $dataToUpdate);
        return redirect()->back()->with('success', 'Image removed');
    }

    // end (IF there is no image)


    // updating user information (UPDATE INFO)

    function user_info_admin(Request $request)
    {

        $id = GetDataFromRequest($request, 'user_hidden_id');

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

        Create_Update_Delete(User::class, ['id' => $id], 'update', $data);

        return Redirect()->back()->with("success", "info updated");
    }

    // end (UPDATE INFO)


    //searching in the user table (SEARCH USER)

    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchOption1 = $request->input('searchOption_1');
        $searchOption2 = $request->input('searchOption_2');
        $searchOption3 = $request->input('searchOption_3');
        $searchOption4 = $request->input('searchOption_4');
        $searchOption5 = $request->input('searchOption_5');
        $searchOption6 = $request->input('searchOption_6');
        $searchOption7 = $request->input('searchOption_7');



        $conditions = [['name', 'LIKE', '%' . $query . '%']];

        if ($searchOption1 === 'byEmail') {
            $conditions = [['email', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption2 === 'byCountry') {
            $conditions = [['country', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption3 === 'byRole') {
            $conditions = [['role', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption4 === 'byLanguage') {
            $conditions = [['language', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption5 === 'byGender') {
            $conditions = [['gender', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption6 === 'byCategory') {
            $conditions = [['favorite_book_genre', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption7 === 'byAge') {
            $conditions = [['age', 'LIKE', '%' . $query . '%']];
        }

        $datas = Get_cols_where_paginate(User::class, 'id', 'ASC', $conditions, 100, ['*']);
        $iterationCount = ($datas->currentPage() - 1) * $datas->perPage();

        return view('admin/search/search_result', [
            'datas' => $datas,
            'iteration' => $iterationCount
        ]);
    }

    // END (SEARCH USER)

    // ------------ END USER (ON SIDEBAR) --------------//

    function AdminMessages()
    {
        if (auth()->check()) {
            $data = auth()->user();
        }

        $messages = $this->Get_cols_where_paginate(Contacts::class, 'id', 'ASC', null, 10, ['*']);
        $iterationCount = ($messages->currentPage() - 1) * $messages->perPage();

        return view('admin/messages', [
            'contacts' => $messages,
            'data' => $data,
            'iteration' => $iterationCount,
        ]);
    }

    // --------------- MESSAGE (ON SIDEBAR) ---------------//


    // delete Message function (DELETE MESSAGE)

    function delete_message($id)
    {
        Create_Update_Delete(Contacts::class, ['id' => $id], 'delete', null);
        return RedirectWithMessage('AdminMessages', 'success', 'Message deleted');
    }

    // end (DELETE MESSAGE)


    // view message function (VIEW MESSAGE)

    function view_message($id)
    {
        $data = $this->SelectWhere(Contacts::class, 'id', $id);
        return $this->Return_View_With_data('admin/showMessage', 'data', $data);
    }

    // end (VIEW MESSAGE)


    // --------------- END MESSAGE (ON SIDEBAR) ---------------//


    // --------------- PROMOTE (ON SIDEBAR) ---------------//


    // promote page function that show all user (PROMOTE PAGE)

    function promote()
    {
        if (auth()->check()) {
            $data = auth()->user();
        }

        $users = $this->Get_cols_where_paginate(User::class, 'id', 'ASC', null, 10, ['*']);
        $iterationCount = ($users->currentPage() - 1) * $users->perPage();

        return view('admin/promote', [
            'users' => $users,
            'data' => $data,
            'iteration' => $iterationCount
        ]);
    }

    // end (PROMOTE PAGE)


    // promote page for a specific user (PROMOTE SPECIFIC USER)
    function promote_user($user_id)
    {
        $user = Auth::user();
        $data = $this->SelectWhere(User::class, 'id', $user_id);

        return view('admin/edit_user_promote', [
            "data" => $data,
            "user" => $user
        ]);
    }

    // end (PROMOTE SPECIFIC USER)


    // promote account into admin FUNCTION (PROMOTE INTO ADMIN)

    function promoteAdmin($id)
    {
        $data = [
            'role' => 1
        ];
        Create_Update_Delete(User::class, ['id' => $id], 'update', $data);
        return redirect()->back()->with('success', 'Role Changed');
    }

    // end (PROMOTE INTO ADMIN)


    // promote account into user FUNCTION (PROMOTE INTO USER)

    function promoteUser($id)
    {
        $data = [
            'role' => 0
        ];
        Create_Update_Delete(User::class, ['id' => $id], 'update', $data);
        return redirect()->back()->with('success', 'Role Changed');
    }

    // end (PROMOTE INTO USER)


    // promote account into moderator FUNCTION (PROMOTE INTO MODERATOR)

    function promoteMode($id)
    {
        $data = [
            'role' => 2
        ];
        Create_Update_Delete(User::class, ['id' => $id], 'update', $data);
        return redirect()->back()->with('success', 'Role Changed');
    }

    // end (PROMOTE INTO MODERATOR)


    //searching in the promote table (SEARCH USER IN PROMOTE TABLE)


    public function search_promote(Request $request)
    {
        $query = $request->input('query');
        $searchOption1 = $request->input('searchOption_1');
        $searchOption3 = $request->input('searchOption_3');



        $conditions = [['email', 'LIKE', '%' . $query . '%']];

        if ($searchOption1 === 'byEmail') {
            $conditions = [['email', 'LIKE', '%' . $query . '%']];
        }

        if ($searchOption3 === 'byRole') {
            $conditions = [['role', 'LIKE', '%' . $query . '%']];
        }

        $datas = Get_cols_where_paginate(User::class, 'id', 'ASC', $conditions, 100, ['*']);
        $iterationCount = ($datas->currentPage() - 1) * $datas->perPage();

        return view('admin/search/search_in_promotion', [
            'users' => $datas,
            'iteration' => $iterationCount
        ]);
    }

    //end (SEARCH USER IN PROMOTE TABLE)

}

    // --------------- END PROMOTE (ON SIDEBAR) ---------------//
