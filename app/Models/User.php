<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function create_supervisor($data)
    {
        $unique = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        $save = new self;
        $save->unique = $unique;
        $save->email = $data['email'];
        $save->name = $data['name'];
        $save->school_id = $data['school_id'];
        $save->department_id = $data['department_id'];
        $save->role = 'Supervisor';
        $save->password = Hash::make($data['password']);
        $save->save();
    }

    public function school()
    {
        return $this->belongsTo(Schools::class, 'school_id');
    }

    public function dept()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
