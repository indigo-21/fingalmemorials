<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailHistory extends Model
{
    use HasFactory;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'emailed_by');
    }

    
}
