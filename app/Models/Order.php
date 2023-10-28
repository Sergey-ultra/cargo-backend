<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'application_number',
        'invoice_number',
        'invoice_is_sent',
        'invoice_payment_date',
        'management_payment',
        'status',
        'contractor_id',
        'price',
        'performer_is_paid',
        'download_address',
        'uploading_address',
        'download_date',
        'uploading_date',
        'cargo_weight',
        'cargo_volume',
        'cargo_name',
        'payment_method_id',
        'performer_payment_method_id',
        'performer_amount',
        'carrier_id',
        'carrier_driver_id',
        'responsible_user_id',
        'vehicle_id',
        'trailer_id',
        'profile_id',
        'user_id',
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
    ];


    public function contractor(): HasOne
    {
        return $this->hasOne(Contractor::class);
    }

    public function fieldValues(): BelongsTo
    {
        return $this->belongsTo(OrderFieldValue::class);
    }
}
