<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobDetail extends Model
{
    use HasFactory;

    public function vatCode(): BelongsTo{
        return $this->belongsTo(VatCode::class);
    }

    public function analysis(): BelongsTo{
        return $this->belongsTo(Analysis::class);
    }
    
}
