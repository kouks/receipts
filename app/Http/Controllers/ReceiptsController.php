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
        authorize('view', [Receipt::class, $household]);

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
        authorize('create', [Receipt::class, $household]);

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
        authorize('create', [Receipt::class, $household]);

        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required|min:10',
            'value'         => 'required|numeric',
            'against.0'     => 'required|numeric',
        ]);

        $household->addReceipt($request->all());

        return back()->with('success', 'Receipt added');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        authorize('delete', [Receipt::class, $household]);

        Receipt::find($id)->delete();

        return back()->with('success', 'Receipt removed from database');;
    }
}
