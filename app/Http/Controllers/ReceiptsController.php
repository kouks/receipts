<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
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
     * Display a listing of the resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function index(Household $household)
    {
        $this->authorize('view', [Receipt::class, $household]);

        $receipts = Receipt::where('paid', 0)->get();

        return view('receipts.index', compact('household', 'receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function create(Household $household)
    {
        return view('receipts.create', compact('household'));
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
        $this->authorize('create', [Receipt::class, $household]);

        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required|min:10',
            'value'         => 'required|numeric',
            'against.0'     => 'required|numeric',
        ]);

        $household->addReceipt($request->all());

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
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', [Receipt::class, $household]);

        Receipt::find($id)->delete();

        return back();
    }
}
