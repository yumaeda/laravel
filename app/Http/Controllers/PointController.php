<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
 * Controller for point management
 *
 */
class PointController extends Controller
{
    /*
     * Constructor
     *
     */
    public function __construct()
    {
    }

    /*
     * Show point index page
     *
     * @access public
     * @return void
     *
     */
    public function index()
    {
        $users = User::select('id', 'first_name', 'last_name')
            ->where('id', '!=', Auth::id())
            ->get();

        return view('points/index', [ 'users' => $users ]);
    }
}

