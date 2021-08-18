<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $get = array();
        if($_POST){
            $su = User::where('role', 'Supervisor')->get();
            $stu = User::where('role', 'Student')->get();

            $supervisorId = $su->pluck('id');
            $nextSupervisor = 0;
            foreach ($stu as $key => $value) {
                $user = User::find($value->id);
                $user->supervisor_id = $supervisorId[$nextSupervisor];
                $user->save();
                if ($nextSupervisor == $su->count() - 1 ) {
                    $nextSupervisor = 0;
                }else{
                    $nextSupervisor = $nextSupervisor + 1;
                }
            }
            Session::flash('success', "Supervisor Assigned Successfully");
            return back();            
        }else{            
        $data['title'] = 'Manage Siwes Program';
        $data['supervisors'] = $s = User::where('role', 'Supervisor')->count();
        $data['students'] = $s = User::where('role', 'Student')->count();
        return view('admin.siwes.index', $data);
        }
    }
}
