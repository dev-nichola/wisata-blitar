<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function tour() : HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
