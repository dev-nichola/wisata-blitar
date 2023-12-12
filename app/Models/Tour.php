<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
   protected $table = "tours";
   protected $primaryKey = "id";
   protected $keyType = "int";
   public $timestamps = true;
   public $incrementing = true;

   public function category() : BelongsTo
   {
    return $this->belongsTo(Category::class, 'category_id', 'id');
   }

   public function district() : BelongsTo
   {
    return $this->belongsTo(District::class, 'district_id', 'id');
   }
}
