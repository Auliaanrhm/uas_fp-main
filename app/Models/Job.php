<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'description', 'image'];

    public function recruitments()
    {
        return $this->hasMany(Recruitment::class, 'job_id');
    }
}
