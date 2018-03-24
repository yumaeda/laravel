<?php
namespace App\Http\Controllers;

use App\User;
use App\PointTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    const ADMIN_USER_ID = 0;
    const CONVERSION_RATE = 1000;

    /*
     * Constructor
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $users = User::select('id', 'first_name', 'last_name')
            ->where('id', '!=', Auth::id())
            ->get();

        return view('admin.index', [ 'users' => $users ]);
    }

    /*
     * Make a deposit for the specified user
     *
     * @access public
     * @param Request $request
     * @return void
    */
    public function deposit(Request $request)
    {
        $point = $this->convertToPoint($request->input('yen'));
        $user_id = $request->input('user_id');

        DB::beginTransaction();
        $user = User::whereId($user_id)->first();
        $user_name = ($user->first_name . ' ' . $user->last_name);

        try {
            $transaction = new PointTransaction;
            $transaction->donner_id    = self::ADMIN_USER_ID;
            $transaction->recipient_id = $user_id;
            $transaction->amount       = $point;
            $transaction->completed    = 1;
            $transaction->save();

            $user->point = ($user->point + $point);
            $user->save();

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }

        return view('admin.deposit', [ 'point' => $point, 'user_name' => $user_name ]);
    }

    /*
     * Convert JPY to point
     *
     * @access protected
     * @param int $yen
     * @return int
    */
    protected function convertToPoint(int $yen): int
    {
        return floor($yen / self::CONVERSION_RATE);
    }
}
