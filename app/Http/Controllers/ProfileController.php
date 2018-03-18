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
     * List of blood types
     */
    const BLOOD_TYPES = [
        '?',
        'A',
        'AB',
        'B',
        'O',
    ];

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
     * @return void
     *
     */
    public function index()
    {
        $blood_type = self::BLOOD_TYPES[auth()->user()->blood_type];

        return view('profiles/index', [ 'blood_type' => $blood_type ]);
    }
}

