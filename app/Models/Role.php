<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    // Relasi dengan User
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Scope untuk mencari role berdasarkan name
    public function scopeByName($query, $name)
    {
        return $query->where('name', $name);
    }
}
