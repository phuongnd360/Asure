<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class HomeController extends Controller
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
     */
    public function index()
    {
        $typeUser = Auth::user()->type;
        if($typeUser == 'mentor') {
            $users = User::where('type', 1)->get();
        } else if ($typeUser == 'student') {
            $users = User::where('type', 2)->get();
        } else {
            $users = User::where('type', 1)->orWhere('type', 2)->get();
        }
        return view('home', compact('users', 'typeUser'));
    }

    /**
     * Add the user.
     *@Method GET
     */
    public function addUser() {
        $typeUser = Auth::user()->type;
        if($typeUser != 'admin') return redirect('/home');
        return view('addUser');
    }

    /**
     * Add the user.
     *@Method POST
     */
    public function saveAddUser(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'type' => 'required'
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Email field must be email address.',
            'email.unique' => 'This email address existed.',
            'password.required' => 'Please enter password.',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['created_by'] = Auth::user()->id;

        User::create($data);

        return redirect()->route('home')
                        ->with('success','User added successfully.');
    }

     /**
     * Show the user detail.
     *
     */
    public function showUser($id) {
        $user = User::findOrFail($id);
        return view('show', compact('user'));
    }

     /**
     * The user delete.
     *
     */
    public function delUser(Request $request, $id) {
        $typeUser = Auth::user()->type;
        if($typeUser != 'admin') return redirect()->route('home');

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')
                        ->with('success','User deleted successfully.');
    }
}
