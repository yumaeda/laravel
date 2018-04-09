<?php
namespace App\Http\Controllers;

use App\User;
use App\PointTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
 * Controller for point management
 *
 */
class PointController extends Controller
{
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

    /*
     * Donate point from the current user to the specified user
     *
     * @access public
     * @param Request $request
     * @return void
     *
     */
    public function donate(Request $request)
    {
        $donner = auth()->user();
        $point = $request->input('point');
        $comment = $request->input('comment');
        $user_id = $request->input('user_id');

        DB::beginTransaction();
        $user = User::whereId($user_id)->first();
        $user_name = ($user->first_name . ' ' . $user->last_name);
        $transactioins = [];

        try {
            $transaction = new PointTransaction;
            $transaction->donner_id    = $donner->id;
            $transaction->recipient_id = $user_id;
            $transaction->amount       = $point;
            $transaction->comment      = $comment;
            $transaction->completed    = 1;
            $transaction->save();

            $donner->point = ($donner->point - $point);
            $donner->save();

            $user->point = ($user->point + $point);
            $user->save();

            // TODO yumaeda: Send notification mail.

            $transactions[] = [
                'point' => $point,
                'user_name' => $user_name,
            ];

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }

        return redirect()->back()->with('transactions', $transactions);
    }
}

