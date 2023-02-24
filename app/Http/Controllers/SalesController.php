<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\User;
use Illuminate\Http\Request;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.createsales',[
            'users'=>User::all(),
            'products'=>Products::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UpdateSalesRequest $request ,int $id )
    {
        $total=Products::where('price', $id);
        Sales::create([
            'userName'=>$request->input('userName'),
            'productName'=>$request->input('productName'),
            'history'=>$request->input('history'),
            'total'=> $request->input('price'),

        ]);
        return redirect('Sales')->with('status','Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(int $salesID)
    {
        return view('sales.editsales',[
            'sales'=>Sales::all()->where('id',$salesID),
            'salesID' => $salesID,
            'users'=>User::all(),
            'products'=>Products::all()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, int $salesID)
    {
        $edit = Sales::find($salesID);
        $edit->userName = $request->input('userName');
        $edit->productName = $request->input('productName');
        $edit->history = $request->input('history');
        $edit->update();
        return redirect('Sales')->with('status','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales,int $salesID)
    {
        $delete = Sales::find($salesID);
        $delete->delete();
        return redirect('Sales')->with('status','Deleted Successfully');
    }
}
