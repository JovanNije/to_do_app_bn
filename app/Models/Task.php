<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','description','isFavorite'];
    
    public $timestamps = false; // Assuming your Tasks table doesn't have timestamps
}
