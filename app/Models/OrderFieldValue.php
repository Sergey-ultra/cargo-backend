<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFieldValue extends Model
{
    protected $fillable = ['order_id', 'list_field_id', 'value'];
}
