<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Diskon, CategoryKamar};
Use Alert;
class DiskonController extends Controller

{
    public function index()
    {
    	$user = auth()->user();
    	$diskons = CategoryKamar::where('id_pembuat', $user->id)->get();
        $diskon = Diskon::where('id_pembuat', $user->id)->get();

       foreach ($diskon as $dis) {
            if (!$dis) {
              $category_kamar[] = CategoryKamar::where('id_pembuat',$user->id)->get();
            }elseif($dis){
               $category_kamar[] = CategoryKamar::where('id_pembuat',$user->id)->where('id', '!=', $dis->kamar_id)->get();

            }
        }   
    	return view('dashboard.home pages.diskon.diskon', compact('diskons', 'category_kamar')); 
    }

    // public function create()
    // {	
    // 	$user = auth()->user();

    //     $diskon = Diskon::where('id_pembuat', $user->id)->get();

    //     if ($diskon->isEmpty()) {
    //       $category_kamar = CategoryKamar::where('id_pembuat',$user->id)->get();
    //     }elseif($diskon){
    //          foreach ($diskon as $d) {
    //       $category_kamar = CategoryKamar::where('id_pembuat',$user->id)->where('id', '!=', $d->kamar_id)->get();
    //         };
    //     }
    // 	return view('dashboard.home pages.diskon.create', compact('category_kamar'));
    // }

    public function store(Request $request)
    {
    	$request->validate([
    		'kamar' => 'required',
    		'type' => 'required',
    		'diskon' => 'required|numeric',
    		'diskon_start' => 'required',
    		'diskon_end' => 'required',
    	]);

        $diskon = Diskon::where('kamar_id', $request->kamar)->first();
        if($diskon){
        
        return redirect()->back();

        }elseif(!$diskon){

    	$attr = $request->all();
    	$attr['id_pembuat'] = auth()->user()->id;
    	$attr['kamar_id'] = $request->kamar;
    	$diskon = Diskon::create($attr);

    	return redirect()->back()->with('success', 'Discount Created Successfully!');
        }



    }


    public function edit($id)
    {	
    	$diskon = CategoryKamar::with('diskon')->where('id', $id)->first();
    	if ($diskon->diskon->id_pembuat != auth()->user()->id ) {
    		return redirect()->back();
    	}else{
    		return view('dashboard.home pages.diskon.edit', compact('diskon'));
    	}

    }

    public function update(Request $request,$id)
    {
    	$attr = $request->all();
    	$diskon = Diskon::where('kamar_id', $id)->first();
    	$diskon->update($attr);
    	return redirect()->route('diskon_kamar')->with('success', 'Discount Edited Successfully!');
    }

    public function destroy($id)
    {
        
        $diskon = Diskon::where('kamar_id', $id)->first();
        $diskon->delete();
        return redirect()->back()->with('success', 'Discount Deleted Successfully!');
    }


    public function show($id)
    {

    }

    

}

