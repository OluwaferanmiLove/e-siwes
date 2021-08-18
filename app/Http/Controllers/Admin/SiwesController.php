<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SiwesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_new = new User();
    }

    public function index()
    {
        if($_POST){
            $su = User::where('role', 'Supervisor')->count();
            $st = User::where('role', 'Student')->count();
            dd($su, $st);            
        }else{            
        $data['title'] = 'Manage Siwes Program';
        $data['supervisors'] = $s = User::where('role', 'Supervisor')->count();
        $data['students'] = $s = User::where('role', 'Student')->count();
        return view('admin.siwes.index', $data);
        }
    }
}
