<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\FormField;
use Illuminate\Support\Collection;

class FormFieldRepository
{
    public function orderList(): Collection
    {
        return FormField::query()
            ->select(
                'form_fields.field',
                'form_fields.slug',
                'form_fields.type',
                'form_fields.list_id',
                'form_fields.group',
                'form_fields.order'
            )
            ->join('form_blocks','form_fields.block_id', '=', 'form_blocks.id')
            ->where('form_blocks.slug', 'order')
            ->whereNull('form_fields.user_id')
            ->get();
    }
}
