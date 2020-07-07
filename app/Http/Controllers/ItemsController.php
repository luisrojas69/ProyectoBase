<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.items.items');
        //return Item::all();
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
            'email' => 'required|unique:items|email',
            'name'  => 'required',
        ]);


        $item = new Item([
            "name"  => $request->input('name'),
            "email" => $request->input('email')
        ]);

        $item->save();

        return $item;
    }


    public function edit(Item $item)
    {
        return $item;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
         $item->name = $request->input('name');
         $item->email = $request->input('email');
         $item->save();
         return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json(['res' => 'success']);
    }
}
