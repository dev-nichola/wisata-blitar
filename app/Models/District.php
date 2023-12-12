<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
   protected $table = "districts";
   protected $primaryKey = "id";
   protected $keyType = "int";
   public $timestamps = true;
   public $incrementing = true;
   public function regency() : BelongsTo
   {
    return $this->belongsTo(Regency::class, 'regency_id', 'id');
   }

}
