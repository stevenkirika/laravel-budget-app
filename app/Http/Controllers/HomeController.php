<?php

namespace Budgetapp\Http\Controllers;

use Illuminate\Http\Request;
use Budgetapp\budget;
use Budgetapp\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user_id = auth()->user()->id;
        //$user = User::find($user_id);
        $budgets = Budget::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(5);
        return view('home')->with('budgets', $budgets);
    }


  

}
