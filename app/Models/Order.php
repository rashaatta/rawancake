<?php

namespace App\Models;

use App\Models\Traits\HasMediaTrait;
use App\Models\Traits\SourceTrait;
use App\Transformers\OrderTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Order extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use SourceTrait;

    protected $fillable = [
        'id',
        'UserID',
        'ZoneID',
        'OrderDate',
        'Name',
        'address',
        'Phone',
        'Phone2',
        'delivery_type',
        'DeliveryTime',
        'ZonePrice',
        'Total',
        'Discount',
        'AddValue',
        'Points',
        'Status',
        'Note',
        'BranchID',
        'Source',
        'Note',
        'blob'
    ];

    public function setPaymentMethodAttribute($value)
    {
        switch ($value) {
            case 'cash_on_delivery':
                $this->attributes['PaymentMethod'] = 0;
                break;
            case 'payment_by_credit_card':
                $this->attributes['PaymentMethod'] = 1;
                break;
        }

    }

    public function getPaymentMethodAttribute($value)
    {
        switch ($value) {
            case 0:
                return 'cash on delivery';
            case 1:
                return 'pay by credit card';

        }
    }

    public function setStatusAttribute($value)
    {
        switch ($value) {
            case 'waiting':
                $this->attributes['Status'] = 0;
                break;
            case 'accepted':
                $this->attributes['Status'] = 1;
                break;
            case 'rejected':
                $this->attributes['Status'] = 2;
                break;
            case 'cancel':
                $this->attributes['Status'] = 3;
                break;
        }
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 0:
                return @langucw('waiting');
            case 1:
                return @langucw('accepted');
            case 2:
                return @langucw('rejected');
            case 3:
                return @langucw('cancel');
        }
    }

    public function scopeNewOrder($query)
    {
        return $query->where('Status', 0);
    }

    public function scopeAcceptedOrder($query)
    {
        return $query->where('Status', 1);
    }
    public function scopeCompleted($query)
    {
        return $query->where('Status', 1);
    }
    public function scopeRejectedOrder($query)
    {
        return $query->where('Status', 2);
    }

    public function scopeCancelOrder($query)
    {
        return $query->where('Status', 3);
    }

    public function scopeCashOnDelivery($query)
    {
        return $query->where('PaymentMethod', 0);
    }

    public function scopeElectronicPayment($query)
    {
        return $query->where('PaymentMethod', 1);
    }

    public function scopePersonalPickup($query)
    {
        return $query->where('delivery_type', 'personal_pickup');
    }

    public function scopeDeliveryAddress($query)
    {
        return $query->where('delivery_type', 'delivery_address');
    }

    public function zone()
    {
        return $this->belongsTo(Zones::class, 'ZoneID');
    }

    public function branch()
    {
        return $this->belongsTo(Zones::class, 'BranchID');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID');
    }

    public function orderCoupon()
    {
        return $this->hasOne(OrderCoupon::class, 'OrderID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function transformer()
    {
        return OrderTransformer::class;
    }
}
