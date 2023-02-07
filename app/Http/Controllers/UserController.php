<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;

class UserController extends Controller
{
    public function importView(Request $request){
        return view('import');
    }

    public function import(Request $request){
        $import = Excel::import(new ImportUser, $request->file('file')->store('files'));
        if($import){
            return redirect()->back()->with('success', 'Excel Imported Successfully');
        } else {
            return redirect()->back()->with('failed', 'Something Went Wrong!');
        }
    }

    // public function exportUsers(Request $request){
    //     return Excel::download(new ExportUser, 'users.xlsx');
    // }
}