<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $evas = DB::table('evaluates')
            ->join('users', 'evaluates.userID', '=', 'users.id')
            ->select('users.fullName', 'createdDate', 'numberStar', 'content', 'avatarUrl')
            ->orderBy('createdDate', 'desc')
            ->paginate(2);

        $restaurant = Restaurant::findOrFail(1);

        if (isset(Auth::user()->email)) {
            $email = Auth::user()->email;
            $user = DB::table('users')->where('email', $email)->first();

            Session::put('idUser', $user->id);
            $isOrder = DB::table('users')
                ->join('orders', 'users.id', '=', 'orders.userID')
                ->select('status')
                ->where('status', 4)
                ->where('userId', $user->id)
                ->get();
            // return json_encode($isOrder);
            if ($isOrder->isEmpty()) {
                Session::put('statusReview', 0);
            } else {
                Session::put('statusReview', 1);
            }
        }
        $statusReview = Session::get('statusReview', 0);
        return view('home')->with('list_evas', $evas)->with('statusReview', $statusReview)->with('restaurant', $restaurant);
    }
}
