<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiwesSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SiwesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_new = new User();
    }

    public function assign(){        
        $su = User::where('role', 'Supervisor')->get();
        $students = User::where('role', 'Student')->get();

        $supervisorId = $su->pluck('id');
        $nextSupervisor = 0;
        foreach ($students as $key => $value) {
            $user = User::find($value->id);
            $user->supervisor_id = $supervisorId[$nextSupervisor];
            $user->save();
            if ($nextSupervisor == $su->count() - 1) {
                $nextSupervisor = 0;
            } else {
                $nextSupervisor = $nextSupervisor + 1;
            }
        }
        $settings = SiwesSettings::find(1);
        $settings->supervisor_assigned = 'Yes';
        $settings->supervisor_assigned_date = Carbon::now();
        $settings->save();
        $settings->save();
    }
    public function re_assign(){
        $students = User::where('role', 'Student')->get();
        foreach ($students as $student) {
            $user = User::find($student->id);
            $user->supervisor_id = null;
            $user->save();
        }
    }

    public function index(Request $request)
    {
        if ($_POST) {
            try {
                if ($request->type == 'assign') {
                    $this->assign();                    
                    Session::flash('success', "Supervisor Assigned Successfully");
                    return back();
                } else if ($request->type == 're_assign') {
                    $this->re_assign();
                    $this->assign();                   
                    Session::flash('success', "Supervisor Re-Assigned Successfully");
                    return back();
                } else if ($request->type == 'start') {
                    $settings = SiwesSettings::find(1);
                    if ($settings->supervisor_assigned == 'No') {
                        Session::flash('warning', "You need to assign Supervisor first before you can start the Siwes Program");
                        return back();
                    }
                    $settings->siwes_start = 'Yes';
                    $settings->siwes_start_date = Carbon::now();
                    $settings->siwes_end = 'No';
                    $settings->siwes_end_date = Carbon::now()->addWeek(12);
                    $settings->save();                  
                    Session::flash('success', "Siwes Program Successfully");
                    return back();
                } else {
                    return redirect()->route('admin_manage_siwes');
                }
            } catch (\Throwable $th) {
                Session::flash('error', $th->getMessage());
                return back();
            }
        } else {
            $data['title'] = 'Manage Siwes Program';
            $data['siwes_settings'] = SiwesSettings::find(1);
            $data['supervisors'] = $s = User::where('role', 'Supervisor')->count();
            $data['students'] = $s = User::where('role', 'Student')->count();
            return view('admin.siwes.index', $data);
        }
    }

}
