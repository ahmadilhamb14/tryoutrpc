<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'id',
        'id_subtest',
        'question',
        'text',
        'image',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'option_key'
    ];

    public function subtest() {
        return $this->belongsTo(Subtest::class, 'id_subtest');
    }
}
