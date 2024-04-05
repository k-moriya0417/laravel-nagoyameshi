<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Restaurant extends Model
{
    use HasFactory,Sortable;

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function favorited_users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function reservation_users() {
        return $this->hasMany(reservation::class);
    }
}
