<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountPosting extends Model
{
    use HasFactory;



    public function account_type(): BelongsTo{
        return $this->belongsTo(AccountType::class);
    }

    public function payment_type(): BelongsTo{
        return $this->belongsTo(PaymentType::class);
    }
}
