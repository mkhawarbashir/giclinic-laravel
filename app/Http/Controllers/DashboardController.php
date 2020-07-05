<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   //Added User model to DashboardController. [MN - 28.06.2020] 

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*Here we add functionality after adding user() in Post.php model and Posts() in User.php model.
            From here we will go to dashboard.blade.php to add some code there.
            Additionally, User model will need to be added in this controller to access it's data. [MN - 28.06.2020]*/
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            /*In below return statement with added ->with('posts', $user->posts). [MN - 28.06.2020]*/
            return view('dashboard')->with('posts', $user->posts);
        //return view('dashboard'); [MN - Commented out on 28.06.2020]
    }
}
