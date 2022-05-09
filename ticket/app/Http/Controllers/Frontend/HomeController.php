<?php

namespace App\Http\Controllers\Frontend;


use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Balance;

class HomeController extends BaseController
{

    /**
     * @var User|Model
     * @var Balance|Model
     */

    public $user;
    public $balance;

    public function __construct(User $user, Balance $balance){
        $this->user = $user;
        $this->balance = $balance;
    }

    public function home(){
            return view('Frontend.home');
    }

    public function user(){
        return view('Frontend.user');
    }

    public function useredit(){
        return view('Frontend.useredit');
    }

    public function usereditpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'identity' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $post = DB::table("users")
            ->where('id', Auth::user()->id)
            ->update([
                "name" => $request->name,
                "surname" => $request->surname,
                "identity" => $request->identity,
                "phone" => $request->phone,
                "email" => $request->email
            ]);
        if ($post) {
            Alert::success('Great!','Profile updated..');
            return back();
        } else {
            Alert::error('Error!', 'Profile could not be updated..');
            return back();
        }
    }

    public function balance(){
        return view('Frontend.balance');
    }

    public function balancepost(Request $request){
        $request->validate([
            'number'=>'required',
            'money'=>'required',
            'card'=>'required',
            'time'=>'required',
            'ccv'=>'required'
        ]);

        $date = date('r:i');
        $balance = DB::table('balance')->insert([
           "number"=>$request->number,
           "money"=>$request->money,
            "card"=>$request->card,
            "time"=>$request->time,
            "ccv"=>$request->ccv,
            "users_id"=>$request->users_id,
        ]);

        if ($balance){
            Alert::success('Great!','Balance loaded successfully..');
            return back();
        }else{
            Alert::error('Error!', 'An error occurred while loading the balance..');
            return back();
        }
    }

    public function ınquiry(){
        $post = $this->balance->money();
        $ufuk = collect($post->toArray());
        $total = array();
        foreach($ufuk as $key){
            $total[]=$key['money'];
        }
        $toplam = array_sum($total);
        return view('Frontend.ınquiry',compact('toplam'));

    }
}
