<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\Item;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Household $household)
    {
        $cart = Item::where('household_id', $household->id)->orderBy('priority', 'desc')->get();

        return view('cart.index', compact('household', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Household $household)
    {
        return view('cart.create', compact('household'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Household     $household
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Household $household, Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'priority' => 'required|numeric',
        ]);

        $household->addItemToCart($request->all());

        return back();
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
        Item::find($id)->delete();

        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Household $household)
    {
        $cart = Item::where('household_id', $household->id)->orderBy('priority', 'desc')->get();

        return view('cart.list', compact('household', 'cart'));
    }
}
