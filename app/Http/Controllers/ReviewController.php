<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Reservasi, Review};

class ReviewController extends Controller
{
   public function index($email)
    {
    	$user = User::where('email', $email)->first();
    	$reviews = Reservasi::with('categorykamar')->where('user_id', $user->id)->get();

    	$icon = [];
    	foreach ($reviews as $review) {
    		 $icon[] = json_decode($review->CategoryKamar->hotels->fasilitas_icon_hotel , TRUE); 
    	}

    
    	return view('site/profile/review', compact('reviews', 'icon'));
    }

   public function review(Request $request)
    {
        
        // //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $sum_rating = $request->rating_1+$request->rating_2+$request->rating_3+$request->rating_4+$request->rating_5;
        $rata_rating = $sum_rating / 5;

        Review::create([
            'hotel_id' => $request->id,
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'user_id' => auth()->user()->id,
            'isi_review' => $request->comment,
            'rating' => $rata_rating
        ]);

        return redirect()->back()->with('success','Comment Added Successfuly');
    }



}
