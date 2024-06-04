<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class);
    }


    public function orderType(): BelongsTo
    {
        return $this->belongsTo(OrderType::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function cemetery(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class);
    }
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class);
    }

    public function graveSpace(): BelongsTo
    {
        return $this->belongsTo(GraveSpace::class);
    }


}
