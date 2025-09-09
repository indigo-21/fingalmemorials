<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountPosting extends Model
{
    use HasFactory,SoftDeletes;



    public function account_type(): BelongsTo{
        return $this->belongsTo(AccountType::class);
    }

    public function payment_type(): BelongsTo{
        return $this->belongsTo(PaymentType::class);
    }
}
