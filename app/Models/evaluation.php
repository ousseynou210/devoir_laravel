<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'date', 'type'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
