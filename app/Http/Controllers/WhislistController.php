<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Whislist, User, CategoryKamar};
class WhislistController extends Controller
{

	public function show($email)
	{
        if ($email == auth()->user()->email) {
           
		$user = User::where('email', $email)->first();
		$whislist = Whislist::where('user_id', $user->id)->paginate(5);
        
        $harga = [];
        foreach($whislist as $ht){
        $harga[] = CategoryKamar::where('hotel_id',$ht->hotel_id)->select('harga')->orderBy('harga','asc')->first();
        }
         return view('site/profile/whislist', compact('user','whislist', 'harga'));   
        }else{
            return redirect()->back();
        }
	}

    public function create($id)
    {

    	$user = auth()->user();
        $cek = Whislist::where('user_id', $user->id)->where('hotel_id', $id)->first();
       
        if ($cek) {
         return redirect()->back();          
        }elseif(!$cek){
            Whislist::create([
            'user_id' => $user->id,
            'hotel_id' => $id,
            ]);
        return redirect()->back()->with('success', 'Whislist Added Successfully!');
        }    	

        

    	
    }

    public function destroy($id)
    {
    	$whislist = Whislist::find($id);
        $whislist->delete();
        return redirect()->back()->with('success', 'Whislist Deleted Successfully!');
    }

    public function destroy_all($id)
    {
        $whislist = Whislist::where('user_id', $id)->get();

        foreach ($whislist as $w) {
             $w->delete();
        }
        return redirect()->back()->with('success', 'All Whislist Deleted Successfully!');
    }
}
