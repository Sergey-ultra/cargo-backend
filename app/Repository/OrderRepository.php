<?php

namespace App\Repository;

use App\Models\FormField;
use App\Models\Order;
use App\Models\OrderFieldValue;
use App\Repository\DTO\ParamsDTO;
use App\Repository\DataProvider\DataProvider;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function list(ParamsDTO $paramsDto): LengthAwarePaginator
    {
        $query = (new Order())
            ->newQuery()
            ->select([
                'orders.id',
                'orders.application_number AS applicationNumber',
                'orders.invoice_is_sent AS invoiceSent',
                'orders.invoice_number AS invoiceNumber',
                'orders.invoice_payment_date AS invoicePaymentDate',
                'orders.price',
                'orders.management_payment AS managementPayment',
                'orders.download_address AS downloadAddress',
                'orders.uploading_address AS unloadingAddress',
                'orders.download_date AS downloadDate',
                'orders.unloading_date AS unloadingDate',
                'orders.performer_amount AS performerAmount',
                'orders.cargo_weight AS cargoWeight',
                'orders.cargo_volume AS cargoVolume',
                'orders.cargo_name AS cargoName',
                'contractors.name AS contractor',
                'drivers.first_name AS driver',
                'orders.created_at AS orderDate',
                'payment_methods.name AS paymentMethod',
                'ppm.name AS performerPaymentMethod',
                'body_types.name AS bodyType'

            ])
            ->leftJoin('contractors', 'contractors.id', '=', 'orders.contractor_id')
            ->leftJoin('drivers', 'drivers.id', '=', 'orders.carrier_driver_id')
            ->leftJoin('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
            ->leftJoin('payment_methods AS ppm', 'payment_methods.id', '=', 'orders.performer_payment_method_id')
            ->leftJoin('body_types', 'body_types.id', '=', 'orders.body_type_id')
        ;

        $dataProvider = new DataProvider($query);

        return $dataProvider
            ->getResult($paramsDto)
            ->through(function (Order $item) {
                $item->orderDate = Carbon::create($item->orderDate)->format('Y-m-d');
                return $item;
            });
    }

    public function save(int $userId, array $data): Order|Model|null
    {
        $model = new Order();

        $forOrderTable = Arr::only($data, $model->getFillable());
        $forFieldValues = Arr::except($data, $model->getFillable());

        try {
            DB::beginTransaction();
            $created = $model->newQuery()->create($forOrderTable);

            $formFields = FormField::query()
                ->select('form_fields.id', 'form_fields.field')
                ->join('form_blocks','form_fields.block_id', '=', 'form_blocks.id')
                ->where('form_blocks.slug', 'order')
                ->where('form_fields.user_id', $userId)
                ->get();

            $createdOrderId = $created->id;
            if (count($formFields)) {
                $insertedFormValues = $formFields
                    ->map(function (FormField $field) use ($createdOrderId, $forFieldValues) {
                        return [
                            'order_id' => $createdOrderId,
                            'list_field_id' => $field->id,
                            'value' => $forFieldValues[$field->field]
                        ];
                    })
                    ->all();

                OrderFieldValue::query()->insert($insertedFormValues);
            }

            DB::commit();
            return $created;
        } catch (\Throwable $e) {
            DB::rollBack();
            return null;
        }
    }

    public function deleteSelected(array $ids): void
    {
        Order::query()->whereIn('id', $ids)->delete();
    }
}
