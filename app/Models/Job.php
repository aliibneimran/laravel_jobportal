<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['title','description','salary','category_id','location_id','vacancy','industry_id','tag','image','availability'];
    public function candidate():HasMany
    {
      return $this->hasMany(Candidate::class); 
    }
    public function category():BelongsTo
    {
      return $this->belongsTo(Category::class); 
    }
    public function location():BelongsTo
    {
      return $this->belongsTo(Location::class); 
    }
    public function industry():BelongsTo
    {
      return $this->belongsTo(Industry::class); 
    }
    


    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = json_encode($value);
    }


    public function getTagAttribute($value)
    {
        // return $this->attributes['tag'] = json_decode($value);
        return is_array($value) ? $value : json_decode($value, true);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'salary' => $this->salary,
            'tag' => $this->tag,
            'category_id' => $this->category_id,
            'location_id' => $this->location_id,
        ];
    }
}
