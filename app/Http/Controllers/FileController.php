<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function index(Request $request)
    {
        $file = $request->file('file');
        $file->move('uploads', $file->getClientOriginalName());
        return response()->json(['success' => true]);
    }
}
