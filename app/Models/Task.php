<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Task extends Model
{
    protected $guarded = [];

    protected $casts = ['completed' => 'boolean'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
