<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'second_name',
        'phone',
        'carrier_id',
        'responsible_user_id',
        'document_serial',
        'document_number',
        'department_code',
        'note'
    ];
}
