<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\MenuFood;
use App\Models\Food;
use App\Models\OrderFood;
use App\Models\Service;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $order = new Order;
        $order->organizationDate = $request->organizationDate;
        $order->peopleNumber = $request->peopleNumber;
        $order->serviceId = $request->serviceId;
        $order->menuId = $request->menuId;
        $order->note = $request->note;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createOrder(Request $request)
    {
        if ($request->note == null) {
            $request->note = '';
        }
        $id = Session::get('idUser', 1);
        $user = User::where('id', $id)->first();

        $order = new Order;
        $order->organizationDate = $request->organizationDate;
        $order->peopleNumber = $request->peopleNumber;
        $order->serviceId = Session::get('serviceId', 0);
        $order->note = $request->note;
        $order->status = 1;
        $order->paymentId = 1;
        $order->userId = $user->id;
        $order->packageId = 0;
        // $order->Service = Service::where('id', Session::get('serviceId', 0))->first();
        $order->save();
        $order->service = Service::where('id', $order->serviceId)->first();



        Session::put('orderId', $order->id);
        $paymentMethods = PaymentMethod::all();


        if ($request->menuId == -1) {
            $foodIds = $request->session()->get('foodIds', null);
            $totalCost = 0;
            $foods = new Collection();
            foreach ($foodIds as $foodId) {
                $food = Food::where('id', $foodId)->first();
                $foods->push($food);
                $totalCost += $food->price;

                $order_food = new OrderFood;
                $order_food->orderId = $order->id;
                $order_food->foodId = $food->id;
                $order_food->save();
            }

            $totalCost *= $request->peopleNumber;
            // if (Session::get('serviceId') == null) {
            //     $service = Service::where('id', Session::get('serviceId', 0))->first();

            //     return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
            //         ->with('totalCost', $totalCost)
            //         ->with('user', $user)
            //         ->with('status', $order->status)
            //         ->with('service', $service);
            // }

            return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
                ->with('totalCost', $totalCost)
                ->with('user', $user)
                ->with('status', $order->status);
        } else {
            $menu = DB::table('menus')->where('id', $request->menuId)->where('serviceId', Session::get('serviceId', 0))
                ->first();

            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            $totalCost = 0;
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::findOrFail($mf->foodId);
                $totalCost += $mf->food->price;
                $order_food = new OrderFood;
                $order_food->orderId = $order->id;
                $order_food->foodId = $mf->food->id;
                $order_food->save();
            }

            $totalCost *= $request->peopleNumber;

            $service = Service::where('id', Session::get('serviceId', 0))->first();
            return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
                ->with('totalCost', $totalCost)
                ->with('user', $user)
                ->with('status', $order->status)
                ->with('service', $service);
        }



        // return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
        //     ->with('totalCost', $totalCost);
    }

    public function backToHomePage()
    {
        redirect('home');
    }

    public function getCart($id)
    {
        $order = Order::where('id', $id)->first();
        $order->service = Service::where('id', $order->serviceId)->first();
        $paymentMethods = PaymentMethod::all();
        $id = Session::get('id', 1);
        $user = User::where('id', $id)->first();

        Session::put('orderId', $id);

        $totalCost = 0;
        $order_foods = OrderFood::where('orderId', $id)->get();
        $foods = new Collection();
        foreach ($order_foods as $order_food) {
            $food = Food::where('id', $order_food->foodId)->first();
            $foods->push($food);
            $totalCost += $food->price;
        }
        $totalCost *= $order->peopleNumber;

        return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
            ->with('totalCost', $totalCost)
            ->with('user', $user)
            ->with('status', $order->status);
    }

    public function updateStatus(Request $request, $id)
    {
        // $id = Session::get('orderId', 1);
        $order = Order::where('id', $id)->first();
        $order->paymentId = $request->payment;
        $order->status = 4;
        $order->update();

        // return redirect()->route('home');
        return back()->with('status', 'Đơn hàng của bạn đã được duyệt. Nhân viên sẽ liên hệ bạn trong thời gian sớm nhất.');
    }
}
