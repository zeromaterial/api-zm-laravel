<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'campaign_id',
        'user_id',
        'payment_method_id',
        'donation_type_id',
        'donation_code',
        'amount',
        'status'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function donationType()
    {
        return $this->belongsTo(DonationType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
