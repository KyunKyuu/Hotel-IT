<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CategoryHotel};
class CategoryHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = CategoryHotel::all();
        return view('dashboard.home pages.category_hotel.hotel', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.home pages.category_hotel.create', ['hotel'=> new CategoryHotel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'negara' => 'required',
        ]);

        $hotel = $request->all();
        CategoryHotel::create($hotel);

        return redirect('/dasboard/category_hotel')->with('success', 'Country Created Successfully!');
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
        $hotel = CategoryHotel::find($id);

        return view('dashboard.home pages.category_hotel.edit', compact('hotel'));
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
        $hotel = CategoryHotel::find($id);
        $data = $request->all();
        $hotel->update($data);

        return redirect('/dasboard/category_hotel')->with('success', 'Country Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = CategoryHotel::find($id);
        $hotel->delete();

        return redirect()->back()->with('success', 'Country Deleted Successfully!');
}
