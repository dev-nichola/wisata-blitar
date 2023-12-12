<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataCollection;
use App\Http\Resources\DataResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\RegencyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Database\Eloquent\Builder;


class MainController extends Controller
{

        private RegencyService $regencyService;
        private string $regency;
        private Request $request;

        public function __construct(RegencyService $regencyService, Request $request)
        {
            $this->regencyService = $regencyService;
            $this->request = $request;
            $this->regency = $this->regency();

        }

        private function regency()
        {
            $kota = 1;
            $kabupaten = 2;

            $url = $this->request->url();

            if(Str::contains($url, '/kota'))
            {
               return $kota;
            } else if(Str::contains($url, '/kabupaten'))
            {
                return $kabupaten;
            }

        }

        public function get() : DataCollection
        {
           $tours = $this->regencyService->getRegency($this->regency);

           return new DataCollection($tours);

        }

        public function getId($id) : DataResource|JsonResponse
        {


            if(!is_numeric($id) )
            {
                return response()->json([
                    "errors" => [
                        "statusCode" => 400,
                        "message" => "Bad request"
                    ]
                ])->setStatusCode(400);
            }

            $tours = $this->regencyService->findById($this->regency, $id);


            if(!isset($tours))
            {
                return response()->json([
                    "errors" => [
                        "statusCode" => 404,
                        "message" => "Not Found"
                    ]
                ])->setStatusCode(404);
            }


            return new DataResource($tours);
        }

        public function search(Request $request) : DataCollection|JsonResponse
        {

            $page = $request->input('page', 1);
            $size = $request->input('size', 10);

            $tours = $this->regencyService->search($this->regency);

            $tours = $tours->where(function(Builder $builder)
                use ($request)
                {
                    $id = $request->input('id');
                    if($id)
                    {
                        $builder->where('id', 'like', '%' . $id . '%');
                    }

                    $name = $request->input('name');
                    if($name)
                    {
                        $builder->where('name', 'like', '%' . $name . '%');
                    }

                    $address = $request->input('address');
                    if($address)
                    {
                        $builder->where('address', 'like', '%'. $address . '%');
                    }

                    $category = $request->input('category');
                    if($category)
                    {
                        $builder->whereHas('category', function($query)
                        use ($category)
                        {
                           $query->where('category', 'like', '%' . $category . '%');
                        });
                    }

                    $district = $request->input('district');
                    if($district)
                    {
                        $builder->whereHas('district', function($query)
                        use ($district)
                        {
                           $query->where('district', 'like', '%' . $district . '%');
                        });
                    }
                }


            );

            $tours = $tours->paginate(perPage:$size, page: $page);


            if($tours->isEmpty())
            {
                return response()->json([
                    "errors" => [
                        "statusCode" => 404,
                        "message" => "Not Found"
                    ]
                ])->setStatusCode(404);
            }
            return new DataCollection($tours);

        }
}
