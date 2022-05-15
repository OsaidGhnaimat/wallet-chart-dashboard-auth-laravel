<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Transaction;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 1)->get();
        return view('dashboard.users.index', compact('users'));
    }




    public function userhavetransaction($id)
    {
        $total_income = Transaction::where([
            'user_id' => $id,
            'transaction' => "income",
        ])->get()->sum("amount");

        $total_expense = Transaction::where([
            'user_id' => $id,
            'transaction' => "expense",
        ])->get()->sum("amount");

        return view('dashboard.users.userhavetransaction', compact('total_expense', 'total_income'));

    }
    
    public function create(){
        return view('dashboard.users.create');
    }

    public function edit($id)
    {
        $userEdit = User::find($id);
        return view('dashboard.users.edit' , compact("userEdit"));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'user_img'     =>'required',
            'name'       =>'required',
            'email'=>'required',
            'password'   =>'required',
            'birthdate'   =>'required',
            'phone'   =>'required',
            'balance'   =>'required'

        ]);

            $file = $request->user_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
            
        User::create([
            'name'      => $request->name,
            'email'        => $request->email,
            'password' => Hash::make($request->password),
            'birthdate'    => $request->birthdate,
            'phone'     => $request->phone,
            'balance'     => $request->balance,
            'role_id'     => $request->role_id,
            "user_img"  => './uploads/' . $new_file
        ]);
        return redirect()->route('user.index');
    }

    public function update(Request $request, $id)
    {
       
        // dd($request);
        $userUpdate = User::find($id);
        if($request->hasFile('user_img')){
            $file = $request->user_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
            $userUpdate->user_img =  './uploads/' . $new_file ;
        }
        $userUpdate->name = $request->name ;
        $userUpdate->email     = $request->email ;
        $userUpdate->balance = $request->balance ;
        $userUpdate->birthdate     = $request->birthdate ;
        $userUpdate->phone     = $request->phone ;
        $userUpdate->password  = Hash::make($request->password) ;
        
        $userUpdate->update();
        return redirect()->route('user.index');
    }

    
    public function firstPage(Request $request){
        $request->validate([
            'balance'   =>'required'
        ]);
        $userUpdate = User::find(Auth::user()->id);
        $userUpdate->balance = $request->balance ;
        $userUpdate->update();
        
        return redirect()->route('secondPage');

    }

    public function destroy($id)
    {
        $userDestroy = User::find($id);
        $userDestroy->destroy($id);
        return redirect()->route('user.index');
    }

    public function chart($id){
        $monthly = DB::select("SELECT month(created_at) as month, 
                                sum(amount) as total_amount
                                from transactions WHERE user_id = '$id' AND transaction = 'income' group by month(created_at)");
        // echo '<pre>';
        // print_r($transactions);
        // die;
        $yearly = DB::select("SELECT year(created_at) as year, 
                                sum(amount) as total_amount
                                from transactions WHERE user_id = '$id' AND transaction = 'income' group by year(created_at)");

        $daily = DB::select("SELECT day(created_at) as day, 
                            sum(amount) as total_amount
                            from transactions WHERE user_id = '$id' AND transaction = 'income' group by day(created_at)");

        return view('chart', compact('monthly', 'yearly', 'daily'));
    }
}
