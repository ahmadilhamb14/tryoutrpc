<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    public function kabupaten() {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
