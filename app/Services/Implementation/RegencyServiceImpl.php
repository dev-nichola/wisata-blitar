<?php
namespace App\Services\Implementation;

use App\Models\Tour;
use App\Services\RegencyService;
use Illuminate\Database\Eloquent\Collection;

class RegencyServiceImpl implements RegencyService
{

    private function putData(int $idRegency)
    {
        return Tour::query()->whereHas('district.regency',
        function($query)
        use ($idRegency)
          {
            $query->where('id', $idRegency);
          });
    }
    public function getRegency(int $idRegency)
    {

      return $this->putData($idRegency)->get();
    }

    public function findById(int $idRegency, ?int $id = null)
    {
        return $this->putData($idRegency)->find($id);
    }

    public function search(int $idRegency)
    {
        return $this->putData($idRegency);
    }
}
