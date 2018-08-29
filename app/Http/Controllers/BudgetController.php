<?php

namespace Budgetapp\Http\Controllers;

use Illuminate\Http\Request;
use Budgetapp\budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$budgets = Budget::orderBy('created_at', 'desc')->paginate(5);
        return redirect('/home');
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
        $this->validate($request, [
         'description'=>'required',
         'amount' => 'required'
       ]);
         //create budget
       $budget = new Budget;
       $budget->description = $request->input('description');
       $budget->amount= $request->input('amount');
       $budget->type= $request->input('type');
       $budget->user_id = auth()->user()->id;
       $budget->save(); 

       return redirect('/home')->with('success', 'Item Added Successfully');   

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
       $this->validate($request, [
         'description'=>'required',
         'amount' => 'required'
       ]);
         //create budget
       $budget = Budget::find($id);
       $budget->description = $request->input('description');
       $budget->amount= $request->input('amount');
       $budget->type= $request->input('type');
       $budget->save(); 

       return redirect('/home')->with('success', 'Item Updated Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::find($id);   
        $budget->delete();
        return redirect('/home')->with('success', 'Item removed');
    }
}
