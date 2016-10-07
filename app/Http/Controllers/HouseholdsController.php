<?php

namespace App\Http\Controllers;

use App\Core\DebtCalculator;
use App\Http\Requests;
use App\Models\Household;
use Illuminate\Http\Request;

class HouseholdsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $households = Household::all();

        return view('households.index', compact('households'));
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
        auth()->user()->addHousehold(
            $request->all()
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function show(Household $household)
    {
        $this->authorize('view', $household);

        return view('households.show', compact('household'));
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Household $household
     * @return \Illuminate\Http\Response
     */
    public function toggle(Household $household)
    {
        auth()->user()->toggleHousehold($household);

    	return back();
    }
}
