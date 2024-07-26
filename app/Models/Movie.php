<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'intro', 'release_date', 'genes_id'];

    public function genes()
    {
        return $this->belongsTo(Genes::class);
    }
}
