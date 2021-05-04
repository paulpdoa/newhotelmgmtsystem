<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\RoomPrice;
use App\Models\RoomBand;
use App\Models\RoomType;
use App\Models\FacilityList;
use App\Models\RoomFacility;
use Error;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }
    public function index(){

        $rooms = Room::
            join('room_types','rooms.room_type_id','=','room_types.room_type_id')
                ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                    ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                        ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                            ->get();

        return view('rooms.index',['rooms' => $rooms]);
        
    }
    public function show($id){
        $rooms = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
                ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                    ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                        // ->join('room_facilities','rooms.room_id','=','room_facilities.room_id')
                        //     ->join('facility_lists','room_facilities.facility_id','=','facility_lists.facility_id')
                        // 'facility_lists.facility_id','room_facilities.room_facility_id','facility_lists.facility_description','room_facilities.facility_details'
                        ->select('rooms.room_id','room_types.room_type_id','room_bands.room_band_id',
                        'room_prices.room_price_id','room_types.room_type',
                        'room_prices.room_price','room_bands.room_description')
                        ->findOrFail($id);               
                            
        return view('rooms.show',[
            'rooms' => $rooms,
            ]);

            
    }

    public function update(Request $req){
// using request needs the name tag from html
// insert the price to room prices table
// insert the description in room bands table
        $rooms = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
                ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                    ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                        ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                            ->findOrFail($req->id);
        $roomDesc = RoomBand::findOrFail($req->roombandid);
        $roomType = RoomType::findOrFail($req->roomtypeid);
        $roomPrice = RoomPrice::findOrFail($req->roompriceid);

        $facilityDesc = FacilityList::findOrFail($req->facilityid);
        $facilityDetail = RoomFacility::findOrFail($req->roomfacilityid);
        // insert rooms
        $roomType->room_type = $req->roomtype;
        $roomPrice->room_price = $req->roomprice;
        $roomDesc->room_description = $req->roomdescription;
        // insert facilities
        $facilityDesc->facility_description = $req->facilitydesc;
        $facilityDetail->facility_details = $req->facilitydetail;

        $roomDesc->save();
        $roomType->save();
        $roomPrice->save();

        $facilityDesc->save();
        $facilityDetail->save();

        return redirect('/')->with('mssg','Room has been updated successfully!');
    }

    public function search(Request $req) {

        $search = $req->get('search-room');

        $rooms = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
            ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                    ->where('room_types.room_type','like','%'.$search.'%')->paginate(5);
               
        return view('rooms.index',['rooms' => $rooms]);

    }

    public function create(){
        // will get the id before inserting
        $roomPrice=RoomPrice::max('room_price_id')+1;
        $roomType=RoomType::max('room_type_id')+1;
        $roomDesc=RoomBand::max('room_band_id')+1;


        return view('rooms.create',[
            'roomprice' => $roomPrice,
            'roomtype' => $roomType,
            'roomdesc' => $roomDesc
        ]);
    }

    public function store(){
        $room = new Room();
        $roomPrice = new RoomPrice();
        $roomType = new RoomType();
        $roomDesc = new RoomBand();
        $facilityDesc = new FacilityList();

        // insert to rooms table
        $room->room_type_id = request('roomtypeid');
        $room->room_price_id = request('roompriceid');
        $room->room_band_id = request('roomdescid');

        // insert the new added rooms to their specific tables
        $roomType->room_type = request('roomtype');
        $roomPrice->room_price = request('roomprice');
        $roomDesc->room_description = request('roomdescription');

        // insert to facilities table
        $facilityDesc->facility_description = request('facilitydescription');

        $facilityDesc->save();

        $room->save();

        $roomType->save();
        $roomPrice->save();
        $roomDesc->save();

        return redirect('/')->with('mssg','Room has been added successfully!');

    }

    public function destroy($id){
        $room = Room::join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
            ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                ->select('rooms.room_id','room_types.room_type_id','room_bands.room_band_id',
                        'room_prices.room_price_id','room_types.room_type',
                        'room_prices.room_price','room_bands.room_description')
                    ->findOrFail($id);

        // delete rows in rooms table
        $room->delete();
        
        return redirect('/')->with('mssg','Room has been deleted successfully!');
    }

}
