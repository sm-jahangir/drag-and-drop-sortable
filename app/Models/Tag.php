<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childs()
    {
        return $this->hasMany(Tag::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Tag::class, 'parent_id', 'id');
    }
}
