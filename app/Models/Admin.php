<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'email'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'created_by');
    }
}