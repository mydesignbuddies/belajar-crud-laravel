<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;

class GuestController extends Controller
{
    //
    public function index() {
        // database tanpa eloquent untuk menampilkan seluruh isi tabel guests
        // $guests = DB::table('guests')->get();

        // database dengan eloquent
        $guests = Guest::all();
        return view('addGuestForm', ['guests'=>$guests]);
    }

    public function store(Request $request) {
        $guest = new Guest;
        $guest->guestName = $request->input('name');
        $guest->guestEmail = $request->input('email');
        $guest->guestAddress = $request->input('address');

        $guest->save();

        return redirect('/')->with('message', 'Data is successfully saved');
    }

    // function to destroy or delete data from database
    public function destroy($id=0) {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect('/')->with('message', 'Data is successfully deleted');
    }

    // function to edit (modal)
    // public function edit($id) {
    //     $guest = Guest::find($id);
    //     return response()->json($guest);
    // }

    // function to update data in database
    public function update(Request $request) {
        $id = $request->input('id');
        $guest = Guest::find($id);
        $guest->guestName =$request->input('name');
        $guest->guestEmail =$request->input('email');
        $guest->guestAddress =$request->input('address');

        $guest->save();
        return redirect('/')->with('message', 'Data is successfully updated');
    }
}
