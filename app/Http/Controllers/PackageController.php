<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Menu;
use App\Models\PackageCriteria;
use App\Models\Criteria;
use App\Models\Food;
use App\Models\MenuFood;
use App\Models\Service;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::paginate(6);

        foreach ($packages as $package) {
            $package->service = Service::findOrFail($package->id);
        }

        return view('admin.package_ui.packageList')->with('packages', $packages);
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

        $packages = Package::Where('serviceId', $id)->get();

        foreach ($packages as $package) {
            $package->criterias = PackageCriteria::Where('packageId', $package->id)->get();
            foreach ($package->criterias as $pc) {
                $pc->criteria = Criteria::findOrFail($pc->criteriaId);
            }
        }


        $menus = Menu::Where('serviceId', $id)->get();

        foreach ($menus as $menu) {
            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::findOrFail($mf->foodId);
            }
        }

        return view('package')->with([
            'packages' => $packages,
            'menus' => $menus
        ]);
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

    public function offerDetail($id)
    {
        $package = Package::find(1)->get();

        return view('offerDetail')->with('package', $package);
    }
}
