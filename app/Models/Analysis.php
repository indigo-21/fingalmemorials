<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analysis extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'code',
        'description',
        'nominal',
        "branch_id",
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
