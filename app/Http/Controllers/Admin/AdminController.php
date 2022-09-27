<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function toAdminIndex()
    {
        return view('admin.toadmin');
    }

    public function toAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        User::where('email', $request->email)->update([
            'admin' => true
        ]);

        return to_route('admin.index')->with('success', 'New admin updated');
    }
}
