<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @param int $id
     * @return void
     *
     */
    public function index(int $id)
    {
        return view('points/index', [ 'id' => $id ]);
    }
}

