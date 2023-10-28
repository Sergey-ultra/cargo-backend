<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lists extends Model
{
    protected $table = 'lists';

    public function fields(): HasMany
    {
        return $this->hasMany(ListField::class, 'list_id');
    }
}
