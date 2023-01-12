<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'fullname' => 'required',
        'gender' => 'required',
        'pob' => 'required',
        'photo' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'religion' => 'required',
        'marital_status' => 'required',
        'profession' => 'required',
        'nationality' => 'required',
    ];
}
