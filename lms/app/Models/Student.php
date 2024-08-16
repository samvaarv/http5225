<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'fname',
        'lname',
        'email'
    ];

    protected $dates = ['deleted_at'];

    public function courses():BelongsToMany {
        return $this -> belongsToMany(Course::class);
    }
}
