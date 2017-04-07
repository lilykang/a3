<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WbController extends Controller {

    public function index(Request $request) {

    # declare variables and assign initial values
    $totalPoints = 0;
    $todayDate = $request->input('todayDate', null);
    $minWorkout = $request->input('minWorkout', null);
    $journal = $request->input('journal', null);
    $pagesRead = $request->input('pagesRead', null);
    $bonus = $request->input('bonus', null);
    $totalBonus = count($bonus);
    $submit = $request->input('submit',null);

    # When the form is submmitted, the calculation for total points will be made
    # or the errors will display if the inputs do not meet the criteria
    if ($submit) {
        $totalPoints = $totalPoints + $minWorkout + $pagesRead;

        if($journal == 'Yes'){
            $totalPoints = $totalPoints + 20;
        }

        if($totalBonus > 0) {
            $totalPoints = $totalPoints + 20*$totalBonus;
        }

        # Validate the request data
        $this->validate($request, [
            'todayDate' => 'required|date',
            'minWorkout' => 'required|numeric|min:0',
            'journal' => 'required',
            'pagesRead' => 'required|integer|min:0',
        ]);

    }

    # return the view with variables
    return view('wb.main')->with([
        'todayDate' => $todayDate,
        'minWorkout' => $minWorkout,
        'journal' => $journal,
        'pagesRead' => $pagesRead,
        'bonus' => $bonus,
        'totalPoints' => $totalPoints,
        'request' => $request,
        'submit' => $submit,
    ]);


    }

}
