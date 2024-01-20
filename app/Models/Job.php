<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','salary','category_id','tag','image','availability'];
    public function category():BelongsTo
    {
      return $this->belongsTo(Category::class); 
    }


    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = json_encode($value);
    }


    public function getTagAttribute($value)
    {
        return $this->attributes['tag'] = json_decode($value);
    }
}
