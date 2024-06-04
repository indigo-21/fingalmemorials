<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cemetery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'address1',
        'address2',
        'address2',
        'postcode',
        'town',
        'county',
        'phone',
        'email',
        'cemetery_group_id',
        'cemetery_area_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function cemeteryGroup():BelongsTo{

        return $this->belongsTo(CemeteryGroup::class);
        
    }
    public function cemeteryArea():BelongsTo{

        return $this->belongsTo(CemeteryArea::class);
        
    }
}
