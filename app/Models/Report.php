<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable  = [
        "user_id", "category_id", "progres_id", "title", "description", "image", "location", "uploaded"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function progres()
    {
        return $this->belongsTo(Progress::class);
    }
    public function response()
    {
        return $this->hasMany(Response::class);
    }
}