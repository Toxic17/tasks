<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $guarded = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $attributes = [
        'completed' => false
    ];
    protected $casts = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }

}
