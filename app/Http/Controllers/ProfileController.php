<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
 * Controller for profile management
 *
 */
class ProfileController extends Controller
{
    /*
     * Constructor
     *
     */
    public function __construct()
    {
    }

    /*
     * Show profile index page
     *
     * @access public
     * @param int $id
     * @return void
     *
     */
    public function index(int $id)
    {
        return view('profiles/index', [ 'id' => $id ]);
    }
}

