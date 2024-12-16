<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name','age','birthday','address','phone',
        'assigned_medicine','fever_information'
    ];
}