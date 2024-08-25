<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'dob',
        'doj',
    ];
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    public $timestamps = true;
}
