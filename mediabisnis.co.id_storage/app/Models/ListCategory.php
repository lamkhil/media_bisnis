<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListCategory extends Model
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
    }

}
