<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrintHistory extends Model
{
    use HasFactory;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'printed_by');
    }
}
