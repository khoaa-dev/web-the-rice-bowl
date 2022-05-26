<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request) {
        $numberUser = DB::table('users')->where('roleId', 2)->count();
        $numberService = DB::table('services')->count();
        $numberFood = DB::table('foods')->count();
        $numberOrder = DB::table('orders')->count();
        $services = Service::all();
        return view('admin.index')->with('services',$services)
                                ->with('numberUser', $numberUser)
                                ->with('numberService',$numberService)
                                ->with('numberFood',$numberFood)
                                ->with('numberOrder',$numberOrder);
    }
}
