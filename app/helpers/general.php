<?php

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// redirect with message
function RedirectWithMessage($Route_path, $Message_key = null, $Message_value = null)
{
    return Redirect()->route($Route_path)->with($Message_key, $Message_value);
}


// get data from request
function GetDataFromRequest(Request $request, $ColumnName)
{
    return $request->input($ColumnName);
}


// select query
function Get_cols_where_paginate($model, $orderBy_Column = 'id', $orderBy_Type = 'ASC', $constraint = [], $paginateNumber = 12, $selectColumns = ['*'])
{
    $datas = $model::select($selectColumns)
    ->where($constraint)
    ->orderBy($orderBy_Column, $orderBy_Type)
    ->paginate($paginateNumber);

    return $datas;
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



// upload a file

function uploadFile($image)
{
    $extension = strtolower($image->extension());
    $filename = time() . rand(1, 10000) . "." . $extension;
    $image->move(public_path('uploads'), $filename);

    return $filename;
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
