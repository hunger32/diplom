<?php

namespace App\Http\Controllers;

use App\Http\Resources\VirtualMarketResource;
use App\Models\VirtualMarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class VirtualMarketController extends Controller
{
    protected $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($virtual_markets = [])
    {

//        $user = Auth::user();
//        $virtual_markets = $user->virtual_market()->get();
        $virtual_markets = VirtualMarketResource::collection(VirtualMarket::all());


        return View::make('virtual_markets.index')
            ->with('virtual_markets', $virtual_markets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('virtual_markets.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= Auth::user();
        VirtualMarket::create([
            'name' => $request->input('name'),
            'slug' => strtolower($request->input('name')),
            'user_id' => $user->getAuthIdentifier(),
        ]);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('virtual_markets.show')
            ->with('virtualMarket', new VirtualMarketResource(VirtualMarket::findOrFail($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VirtualMarket  $virtualMarket
     * @return \Illuminate\Http\Response
     */
    public function edit(VirtualMarket $virtualMarket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VirtualMarket  $virtualMarket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VirtualMarket $virtualMarket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VirtualMarket  $virtualMarket
     * @return \Illuminate\Http\Response
     */
    public function destroy(VirtualMarket $virtualMarket)
    {
        //
    }
}
