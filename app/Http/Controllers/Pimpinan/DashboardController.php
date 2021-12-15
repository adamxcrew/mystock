<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $users;
    protected $role;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->users=Auth::user();
            $this->role=User::with('role')->find($this->users->id)->role;
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        return view('pimpinan.dashboard',array(
            'judul' => "Dashboard Administrator | MYSTOCK V.1.0",
            'aktifTag' => "admin",
            'tagSubMenu' => "admin",
        ));
    }
}
