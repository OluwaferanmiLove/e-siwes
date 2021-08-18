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
        $get = array();
        if($_POST){
            $su = User::where('role', 'Supervisor')->get();
            $stu = User::where('role', 'Student')->get();

            $supervisorId = $su->pluck('id');
            $nextSupervisor = 0;
            // dd($nextSupervisor);
            foreach ($stu as $key => $value) {
                // dd($$key =$value);
                    // dd($supervisorId[$nextSupervisor]);
                $user = User::find($value->id);
                $user->supervisor_id = $supervisorId[$nextSupervisor];
                $user->save();
                // dd([$nextSupervisor]);
                if ($nextSupervisor == $su->count() - 1 ) {
                    // dd($nextSupervisor);
                    $nextSupervisor = 0;
                }else{
                    $nextSupervisor = $nextSupervisor + 1;
                }
                // dd($nextSupervisor);
            }
            // for ($i=0; $i < $stu->count(); $i++) { 
            //     dd($stu);
            //     // dd($supervisorId[$nextSupervisor]);
            // }



            // foreach ($su as $st => $value) {               
            // dd($value->id);
            // }
            
            
        }else{            
        $data['title'] = 'Manage Siwes Program';
        $data['supervisors'] = $s = User::where('role', 'Supervisor')->count();
        $data['students'] = $s = User::where('role', 'Student')->count();
        return view('admin.siwes.index', $data);
        }
    }
}
