<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WbController extends Controller {

    public function index(Request $request) {

    $totalPoints = 0;
    $todayDate = $request->input('todayDate', null);
    $minWorkout = $request->input('minWorkout', null);
    $journal = $request->input('journal', null);
    $pagesRead = $request->input('pagesRead', null);
    $bonus = $request->input('bonus', null);
    $totalBonus = count($bonus);

    if($minWorkout && $minWorkout && $journal && $pagesRead) {
        $totalPoints = $totalPoints + $minWorkout + $pagesRead;

        if($journal == 'Yes'){
            $totalPoints = $totalPoints + 20;
        }

        if($totalBonus > 0) {
            $totalPoints = $totalPoints + 20*$totalBonus;
        }

    }

    # Validate the request data
    /*
    $this->validate($request, [
        'todayDate' => 'required|date',
        'minWorkout' => 'required|numeric|min:0',
        'pagesRead' => 'required|integer|min:0',
        'journal' => 'required'
    ]);
    */

    return view('wb.test')->with([
        'todayDate' => $todayDate,
        'minWorkout' => $minWorkout,
        'journal' => $journal,
        'pagesRead' => $pagesRead,
        'bonus' => $bonus,
        'totalPoints' => $totalPoints,
        'request' => $request,
    ]);


    }

}
