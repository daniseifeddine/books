<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{
    function RedirectWithMessage($Route_path, $Message_key = null, $Message_value = null)
    {
        return redirect()->route($Route_path)->with($Message_key, $Message_value);
    }

    // get data from request
    function GetDataFromRequest(Request $request, $InputName)
    {
        return $request->$InputName;
    }


    // select query
    function Get_cols_where_paginate($model, $orderBy_Column = 'id', $orderBy_Type = 'ASC', $constraint = [], $paginateNumber = 12, $selectColumns = ['*'])
    {
        $datas = $model::select($selectColumns)->where($constraint)->orderBy($orderBy_Column, $orderBy_Type)->paginate($paginateNumber);

        return $datas;
    }

    function Get_cols_where_first($model, $orderBy_Column = 'id', $orderBy_Type = 'ASC', $constraint = [], $selectColumns = ['*'])
    {
        $datas = $model::select($selectColumns)->where($constraint)->orderBy($orderBy_Column, $orderBy_Type)->first();

        return $datas;
    }

    function SelectWhere($model, $columnName, $inputName)
    {
        $user = $model::where($columnName, $inputName)->first();

        return $user;
    }




    // update or create or delete
    function Create_Update_Delete($model, $constraint = [], $function = ['create', 'update', 'delete'], $data_To_Update_Or_Create = null)
    {
        if ($function == "delete") {
            return $model::where($constraint)->delete();
        } else if ($function == "update") {
            return $model::where($constraint)->update($data_To_Update_Or_Create);
        } elseif ($function == 'create') {
            return $model::create($data_To_Update_Or_Create);
        }
    }

    function Find_Data($model, $data)
    {
        $data = $model::findOrFail($data);
        return $data;
    }


    // language //

    // function Convert_Language($local_language)
    // {
    //     $allowedLocales = ['ar', 'en', 'fr', 'es', 'de', 'it', 'pt', 'ru', 'zh'];

    //     if (in_array($local_language, $allowedLocales)) {
    //         session(['locale' => $local_language]);
    //     }

    //     return redirect()->back();
    // }


    function ChangeAlert($Alert_Design_1 = false, $Alert_Design_2 = false, $Alert_Design_3 = false)
    {
        if ($Alert_Design_1) {
            return true;
        } elseif ($Alert_Design_2) {
            return true;
        } elseif ($Alert_Design_3) {
            return true;
        } else {
            // echo "No alert design specified";
        }
    }

    // auth attempt

    function attemptAuthentication(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials);
    }

    function Return_View_With_data($view, $data_key, $data_value)
    {
        return view($view, [$data_key => $data_value]);
    }



    // auth attempt when redirection
    function authRedirectWithData($trueView = null, $userDataKey = null, $falseView = null)
    {
        if (auth()->check()) {
            $userData = auth()->user();
            return Return_View_With_data($trueView, $userDataKey, $userData);
        } else {
            return view($falseView);
        }
    }








    //
    // ================= Image changing ================ //
    function uploadFile($image)
    {
        $extension = strtolower($image->extension());
        $filename = time() . rand(1, 10000) . "." . $extension;
        $image->move(public_path('uploads'), $filename);

        return $filename;
    }


    function uploadPdf($pdfFile, $path_Folder)
    {
        $pdfFileName = time() . rand(1,10000) . '.' . $pdfFile->getClientOriginalExtension();
        $pdfFile->move(public_path($path_Folder), $pdfFileName);
        return $pdfFileName;
    }

    // Delete old image

    function DeleteOldImage($folder_name, $auth_user)
    {
        if ($auth_user->ProfileImage) {
            $oldImage = public_path($folder_name) . '/' . $auth_user->ProfileImage;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    }

    function USER_REMOVE_IMAGE($ColumnName = null, $folder_name = null)
    {
        $user = Auth::user();
        $this->DeleteOldImage($folder_name, $user);
        $dataToUpdate = [$ColumnName => null];
        return Create_Update_Delete(User::class, ['id' => $user->id], 'update', $dataToUpdate);
    }

    function USER_CHANGE_IMAGE(Request $request, $image, $ColumnName = null, $folder_name = null)
    {
        $image = $request->image;
        $filename = uploadFile($image);
        $user = Auth::user();
        $this->DeleteOldImage($folder_name, $user);
        $dataToUpdate = [$ColumnName => $filename];
        return Create_Update_Delete(User::class, ['id' => $user->id], 'update', $dataToUpdate);
    }

    // ================= Image function ends ================ //


    // Change password

    function CHECK_OLD_PASSWORD($old_password)
    {
        $user = Auth::user();

        return !Hash::check($old_password, $user->password);
    }

    function CHECK_NEW_CONFIRMED_PASSWORD($new_password, $confirm_password)
    {
        return $new_password !== $confirm_password;
    }
}
