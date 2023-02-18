<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class FoodController extends Controller
{
    //

    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $type = $request->input('types');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id){
            $food = Food::find($id);

            if($food){
                return ResponseFormatter::success([
                    $food,
                    "Data berhasil diambil!"
                ]);
            } else {
                return ResponseFormatter::error([
                    null,
                    "Data tidak ditemukan"
                    ,404
                ]);
            }
        };

        $food = Food::query();

        if($name){
            $food->where('name', 'like', '%'.$type.'%');
        };

        if($type){
            $food->where('type', 'like', '%'.$type.'%');
        };

        if($price_to){
            $food->where('price', '<=', $price_to);
        }

        if($price_from){
            $food->where('price', '>=', $price_from);
        }

        if($rate_to){
            $food->where('price', '<=', $rate_to);
        }

        if($rate_from){
            $food->where('price', '>=', $rate_from);
        }

            return ResponseFormatter::success($food->paginate($limit), 'Data list produk berhasil diambil');
        }
}