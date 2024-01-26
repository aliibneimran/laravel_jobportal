<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobSeeker extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $fillable = ['name','email','contact','bio','cv'];

}
