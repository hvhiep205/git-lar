<?php
namespace app\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();  // or use ->get() to fetch the data
        return view('users.index', compact('users'));
    }
}
