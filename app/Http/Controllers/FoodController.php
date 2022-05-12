<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Nette\Utils\Arrays;
use Nette\Utils\Json;

class FoodController extends Controller
{
    public function getSearchAjax(Request $request)
    {
        $categoryId = $request->get('categoryId');

        $foodIds = $request->session()->get('foodIds', []);

        if (!$request->get('foodName'))
            $name = "";
        else
            $name = $request->get('foodName');

        if ($categoryId == 0)
            $foods = Food::where('name', 'LIKE', "%{$name}%")->get();
        else
            $foods = Food::where('name', 'LIKE', "%{$name}%")
                ->where('category_id', '=', $categoryId)
                ->get();

        $output = '';
        foreach ($foods as $food) {
            $output .=  '<div class="row" style="padding-left: 15px">';
            $output .=  '<div class="d-flex text" style="margin-bottom: 35px; display: inline-block;width: 90%;">';
            $output .=  '<img src="' . asset($food->image) . '" style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px;box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />';
            $output .=  '&nbsp;&nbsp;';
            $output .= '<h3 style="background: none; padding-top: 7px;">
                             <span style="color: rgb(231, 228, 212) !important; ">' . $food->name . '</span> </h3>';

            $output .= '<span class=" price" style="color: rgb(238, 222, 200); font-size: 18px !important">';
            $output .=  number_format($food->price, 0) . ' đ' . '</span> </div>';
            $output .= '<div class="col-1" style="padding: 0px !important;padding-left: 20px !important;display: inline;padding-top: 8px !important;">';
            $output .= '<input class="form-check-input food_checkbox" type="checkbox" value="' . $food->id . '" id="' . $food->id .  '"';

            if (array_search($food->id, $foodIds) !== false) {
                $output .= ' checked ';
            }

            $output .=  'style="font-size: 20px;margin: 0px !important;" />';
            $output .= '</div> </div>';
        }
        return $output;
    }

    public function addFood(Request $request)
    {
        $foodId = $request->foodId;

        // $ids = $request->session()->get('foodList');

        $request->session()->push('foodIds', $foodId);

        return $request->session()->get('foodIds', 'default');;
    }


    public function removeFood(Request $request)
    {
        $foodId = $request->foodId;

        if ($request->session()->exists('foodIds')) {
            $ids = $request->session()->pull('foodIds', $foodId);

            if (($key = array_search($foodId, $ids)) !== false) {
                unset($ids[$key]);
            }

            $request->session()->put('foodIds', $ids);
        }

        return $request->session()->get('foodIds', 'default');
        // return $ids;
    }

    public function initSession(Request $request)
    {
        $request->session()->forget('foodIds');

        $ids = new Arrays();
        $request->session()->put('foodIds', $ids);
    }

    public function updateMenu(Request $request)
    {
        $foodIds = $request->session()->get('foodIds', []);
        $foods = array();
        $totalPrice = 0;

        foreach ($foodIds as $id) {
            $food = Food::Where('id', $id)->get();
            $totalPrice += $food[0]->price;
            array_push($foods, $food[0]);
        }

        $output = '';

        foreach ($foods as $food) {
            $output .= '<div>'
                . '<div class="d-flex text align-items-center" style="margin-bottom: 35px">'
                . '<img src="' . asset($food->image) . '"'
                . 'style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;
                    max-width:50px; max-height: 50px;min-width: 50px; min-height: 50px;box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />'
                . '&nbsp;&nbsp;'
                . '<h3 style="background: none"><span>' . $food->name . '</h3>'
                . '<span class="price">' . number_format($food->price, 0) . ' đ' . '</span>'
                . '</div></div>';
        }



        $output .= '<div class="align-items-center add-food">
                        <center>
                            <i class="fas fa-plus-circle"></i>
                            <a href="#" class="" data-toggle="modal"
                                data-target="#modalChooseFood">Thêm món ăn</a>
                        </center>
                    </div>

                    <div class="d-flex text align-items-center">
                        <h3 style="background: none;color:rgb(82, 82, 80)"><span class="total">Tổng
                                tiền</span>
                        </h3>
                        <span class="price total" style="width: 200px">' . number_format($totalPrice, 0) . ' đ</span>
                    </div>';

        return $output;
    }
}
