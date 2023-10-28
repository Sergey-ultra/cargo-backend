<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    const TYPE_SELECT = 0;
    const TYPE_DATE = 1;
    const TYPE_NUMBER = 3;
    const TYPE_INPUT = 4;
    const TYPE_CHECKBOX = 5;

    const TYPES_MAP_VALIDATION = [
        self::TYPE_SELECT => 'integer',
        self::TYPE_DATE => 'date',
        self::TYPE_NUMBER => 'numeric',
        self::TYPE_INPUT => 'string',
        self::TYPE_CHECKBOX => 'boolean'
    ];
    protected $fillable = ['field', 'slug', 'type', 'group', 'order'];

    protected $casts = [
        'type' => 'integer'
    ];
}
