<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStream extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /** Relationships */

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
