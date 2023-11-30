<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;
    
    protected $table = 'tryouts';

    public function subtest() {
        return $this->hasMany(SubTest::class);
    }
}
