<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'middlenames',
        'class_room_id',
        'class_stream_id',
        'gender',
        'phone',
        'disability',
        'disability_type',
        'accommodation',
        'vulnerability',
        'parent_name',
        'parent_phone',
        'photo',
        'date_of_birth',
    ];

    protected $casts = [
        'disability' => 'boolean',
        'date_of_birth' => 'date',
    ];

    /** Relationships */
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function classStream()
    {
        return $this->belongsTo(ClassStream::class);
    }

    /** Accessors & Helpers (optional) */
    public function getFullNameAttribute()
    {
        return trim($this->firstname.' '.($this->middlenames ? $this->middlenames.' ' : '').$this->lastname);
    }
}
