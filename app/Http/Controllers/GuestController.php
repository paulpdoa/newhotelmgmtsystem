<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }

    public function index(){
        $guests = DB::select("
        SELECT guest_id,title,first_name,last_name,date_of_birth,
        street,town,province,postal_code,contact_number from guests
        ");

        return view('guests.index',['guests' => $guests]);
    }

    public function show($id){
        $guests = Guest::findOrFail($id);

        return view('guests.show',['guests' => $guests]);
    }

    public function store(){
        $guest = new Guest();

        $guest->title = request('title');
        $guest->first_name = request('firstname');
        $guest->last_name = request('lastname');
        $guest->date_of_birth = request('dateofbirth');
        $guest->street = request('street');
        $guest->town = request('town');
        $guest->province = request('province');
        $guest->postal_code = request('postalcode');
        $guest->contact_number = request('contactnumber');

        $guest->save();

        return redirect('/')->with('mssg','Guest Successfully Inserted!');
    }

    public function create(){
        return view('guests.create');
    }

    public function update(Request $req){

        $guests = Guest::findorFail($req->id);

        $guests->title = $req->title;
        $guests->first_name = $req->firstname;
        $guests->last_name = $req->lastname;
        $guests->date_of_birth = $req->dateofbirth;
        $guests->street = $req->street;
        $guests->town = $req->town;
        $guests->province = $req->province;
        $guests->postal_code = $req->postalcode;
        $guests->contact_number = $req->contactnumber;
      

        $guests->save();

        return redirect('/')->with('mssg','Updated guest successfully!');
    }

    public function search(Request $req){

        $search = $req->get('search-guest');
       
        $guests = Guest::
        where('first_name','like','%'.$search.'%')
        ->orWhere('last_name','like','%'.$search.'%')
        ->orWhere('title','like','%'.$search.'%')->paginate(5);

        return view('guests.index',['guests' => $guests]);
    }

    public function destroy($id){
        $guests = Guest::findOrFail($id);

        $guests->delete();

        return redirect('/')->with('mssg','Guest has been deleted!');
    }
}
