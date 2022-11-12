<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $cast = [
        'done' => 'boolean'
    ];

    public function scopeNotDone(Builder $query): Builder
    {
        return $query->whereDone(false);
    }
}
