<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable =[
        'code',
        'name',
        'address1',
        'address2',
        'address3',
        'postcode',
        'town',
        'county',
        'phone',        
        'email',        
        'created_by',
        'updated_by',
        'deleted_by'

    ];
}
