<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }
    

    public function index(){

        $customer = DB::select("
        SELECT customer_id,title,first_name,last_name,to_char(date_of_birth,'Mon-dd-YYYY') as dob,
        town,street,province,postal_code,home_phone,work_phone,mobile_phone,email,created_at 
        FROM CUSTOMERS
        ");
        
        return view('customers.index',['customer' => $customer]);
    }

    public function show($id){
       $customer = Customer::findOrFail($id);

       return view('customers.show',['customer' => $customer]);
    }

    public function create(){
        return view('customers.create');
    }

    public function store(){
        $customer = new Customer();
        
        $customer->title = request('title');
        $customer->first_name = request('firstname');
        $customer->last_name = request('lastname');
        $customer->date_of_birth = request('dateofbirth');
        $customer->street = request('street');
        $customer->town = request('town');
        $customer->province = request('province');
        $customer->postal_code = request('postalcode');
        $customer->home_phone = request('homephone');
        $customer->work_phone = request('workphone');
        $customer->mobile_phone = request('mobilephone');
        $customer->email = request('email');

        $customer->save();

        return redirect('/')->with('mssg','Added customer successfully!');
    }

    public function update(Request $req){

        $customer = Customer::findOrFail($req->id);
        
        $customer->title = $req->title;
        $customer->first_name = $req->firstname;
        $customer->last_name = $req->lastname;
        $customer->date_of_birth = $req->dateofbirth;
        $customer->street = $req->street;
        $customer->town = $req->town;
        $customer->province = $req->province;
        $customer->postal_code = $req->postalcode;
        $customer->home_phone = $req->homephone;
        $customer->work_phone = $req->workphone;
        $customer->mobile_phone = $req->mobilephone;
        $customer->email = $req->email;

        $customer->save();

  
        return redirect('/')->with('mssg','Updated customer successfully!');

    }

    public function search(Request $req){

        $search = $req->get('search-customer');

        $customer = Customer::
        where('first_name','like','%'.$search.'%')
        ->orWhere('last_name','like','%'.$search.'%')
        ->orWhere('title','like','%'.$search.'%')
        ->paginate(5);
               
        return view('customers.index',['customer' => $customer]);
 //     $records = ['first_name' => '%'.$search.'%',
    //     'title' => '%'.$search.'%',
    //     'last_name' => '%'.$search.'%'
    // ];
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect('/')->with('mssg','Customer has been deleted!');

    }
    // public function quantity(){
    //     $customer = Customer::all();

    //     return view('/',['customers' => $customer]);
    // }

}

