<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all();
        return view('service')->with('services', $services);
    }

    public function listOfService()
    {
        $services = Service::paginate(6);
        return view('admin.service_ui.servicesList')->with('services', $services);
    }
}
