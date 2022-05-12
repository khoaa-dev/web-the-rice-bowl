<?php

namespace App\Http\Controllers;

use App\FoodD;
use App\Models\Menu;
use App\Models\MenuFood;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index()
    {
        $foods = Food::all()->take(6);
        $list[] = array();

        $menus = Menu::all()->take(6);

        foreach ($menus as $menu) {
            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::FindOrFail($mf->foodId);
            }
        }

        $restaurant = Restaurant::findOrFail(1);

        return view('menu')->with([
            'foods' => $foods,
            'menus' => $menus,
            'restaurant' => $restaurant
        ]);
    }


    public function showMenuById(Request $request)
    {
        $id = $request->get('id');

        $foods = DB::table('foods')
            ->join('menu_foods', 'foods.id', '=', 'menu_foods.foodId')
            ->select('id', 'image', 'name', 'price')
            ->where('menuId', $id)
            ->get();

        $output = "";
        foreach ($foods as $food) {
            $output .= '
            <tr class="even pointer" style="font-size: 16px">

                <td class="table-row"><img src="' . asset($food->image) . '" class="img-food" /></td>
                <td class="table-row ">' . $food->name . '</td>
                <td class="table-row ">' . $food->price . '</td>
                <td class="table-row last">
                    <button class="btn btn-danger" onclick=" ">Xóa</button>
                </td>
            </tr>';
        }

        $foodList = array(
            'table_data' => $output
        );
        return json_encode($foodList);
    }
}
