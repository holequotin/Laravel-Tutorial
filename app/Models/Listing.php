<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    public function scopeFilter($query,array $filters){
        if($filters['tag'] ?? false){
            return $query->where('tags','like','%'.request('tag').'%');
        }
        if($filters['search'] ?? false){
            return $query->where('tags','like','%'.request('search').'%')
                        ->orWhere('title','like', '%'.request('search').'%');
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
