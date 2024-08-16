<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'courseID',
        'name',
        'description'
    ];

    protected $dates = ['deleted_at'];

    public function students():BelongsToMany {
        return $this -> belongsToMany(Student::class);
    }
}
