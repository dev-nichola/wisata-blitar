<?php

namespace App\Services;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Collection;

interface RegencyService
{
    public function getRegency(int $idRegency);

    public function findById(int $idRegency, ?int $id = null);

    public function search(int $idRegency);


}
