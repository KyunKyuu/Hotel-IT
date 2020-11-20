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
        
         $sum_rating = $request->rating+$request->rating2+$request->rating3+$request->rating4+$request->rating5;
        $rata_rating = $sum_rating / 5;

        Review::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => auth()->user()->id,
            'isi_review' => $request->comment,
            'rating' => $rata_rating
        ]);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }



}
