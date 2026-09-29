<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teachers';

    protected $fillable = [
        'user_id',
        'teacher_code',
        'first_name',
        'last_name',
        'arabic_name',
        'english_name',
        'photo_path',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'qualification',
        'department',
        'joining_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classes()
    {
        return $this->hasMany(ClassRoom::class, 'teacher_id');
    }
}
