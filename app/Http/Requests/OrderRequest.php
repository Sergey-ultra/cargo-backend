<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\FormField;
use App\Repository\FormFieldRepository;

class OrderRequest extends JsonApiRequest
{
    public function rules(): array
    {
        /** @var FormFieldRepository $formFieldRepository */
        $formFieldRepository = app(FormFieldRepository::class);

        return $formFieldRepository
            ->orderList()
            ->mapWithKeys(fn (FormField $item) => [$item['field'] => sprintf('nullable|%s', FormField::TYPES_MAP_VALIDATION[$item['type']])])
            ->all();
    }
}
