<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo', 'user_id', 'concluida'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
