<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    use HasFactory;
    public function job():BelongsTo
    {
      return $this->belongsTo(Job::class); 
    }
    protected $fillable = ['name','email','contact','bio','cv','job_id'];
}
