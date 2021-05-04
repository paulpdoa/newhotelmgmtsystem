<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomFacility;
use App\Models\FacilityList;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomFacilityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }

    public function index(){
        $rooms=Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('room_facilities','rooms.room_id','=','room_facilities.room_id')
        ->join('facility_lists','room_facilities.facility_id','=','facility_lists.facility_id')
        ->get();

        return view('roomfacilities.index',[
            'rooms' => $rooms
        ]);
    }

    public function create(){
        $rooms = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
            ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                ->get();
        $facilityLists = FacilityList::get();

        return view('roomfacilities.create',[
            'rooms' => $rooms,
            'facilityLists' => $facilityLists
        ]);
    }

    public function store(){
        $roomFacility = new RoomFacility();

        // Room Facility Table
        $roomFacility->room_id = request('roomid');
        $roomFacility->facility_id = request('roomfacilityid');
        $roomFacility->facility_details = request('facilitydetail');

        $roomFacility->save();

        return redirect('/')->with('mssg','Room Facility has been recorded!');
    }

    public function search(Request $req){
        $search = $req->get('search-roomfacility');

        $rooms = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
            ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
            ->join('room_facilities','rooms.room_id','=','room_facilities.room_id')
            ->join('facility_lists','room_facilities.facility_id','=','facility_lists.facility_id')
            ->where('room_types.room_type','like','%'.$search.'%')
            ->paginate(5);

                return view('roomfacilities.index',['rooms' => $rooms]);
    }

    public function show($id){
        $room = RoomFacility::
        join('rooms','room_facilities.room_id','=','rooms.room_id')
        ->join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('facility_lists','room_facilities.facility_id','=','facility_lists.facility_id')
        ->findOrFail($id);

        return view('roomfacilities.show',[
            'room' => $room
        ]);
    }

    public function update(Request $req){
        $roomFacility = RoomFacility::findOrFail($req->roomfacilityid);
        $facilityList = FacilityList::findOrFail($req->facilityid);

        $roomFacility->facility_details = $req->facilitydetail;
        $facilityList->facility_description = $req->facilitydescription;

        $roomFacility->save();
        $facilityList->save();

        return redirect('/')->with('mssg','Facilities has been updated!');

    }

    // public function destroy($id){
    //     $facilityList = FacilityList::select("DELETE from facility_lists where facility_id='$id'");

    //     $facilityList->delete();

    //     return redirect('/')->with('mssg','Room Facility has been deleted!');


    // }

}