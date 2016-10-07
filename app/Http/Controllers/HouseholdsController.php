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

        return back()->with('success', 'Household created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function show(Household $household)
    {
        authorize('view', $household);

        return view('households.show', compact('household'));
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

    	return back()->with('success', 'You toggled the household');
    }
}
