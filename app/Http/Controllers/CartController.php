<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\Item;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['list']
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Household $household)
    {
        authorize('view', [Item::class, $household]);

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
        authorize('create', [Item::class, $household]);

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
        authorize('create', [Item::class, $household]);

        $this->validate($request, [
            'name'     => 'required',
            'priority' => 'required|numeric',
        ]);

        $household->addItemToCart($request->all());

        return back()->with('success', 'Item added to cart');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Household $household, $id)
    {
        authorize('delete', [Item::class, $household]);

        Item::find($id)->delete();

        return back()->with('success', 'Item purchased');
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
