<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Receipt;
use App\Models\User;
use App\Core\DebtCalculator;

class RepaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Household  $household
     * @param  \App\Models\User       $user
     * @return \Illuminate\Http\Response
     */
    public function index(Household $household, User $user)
    {
        $receipts = Receipt::betweenUsers([$user->id, auth()->user()->id])->get();

        $amount = app('calculator')->forReceipts($receipts);

        return view('repayments.index', compact('household', 'user', 'amount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Household     $household
     * @param  \App\Models\User          $user
     * @return \Illuminate\Http\Response
     */
    public function store(Household $household, User $user)
    {
        $receipts = Receipt::betweenUsers([$user->id, auth()->user()->id])->get()->map(function ($receipt) {
            $receipt->pay();
        });

        return redirect("/households/$household->id");
    }
}
