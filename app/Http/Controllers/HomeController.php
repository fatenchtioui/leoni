<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Databa;
use App\Models\Datafm;
use App\Models\Datafw;
use App\Models\Datarh;
use App\Models\Datavc;
use App\Models\Datavc12;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'admin') {
                $users = User::all();
                return view('dashboard',compact('users'));
            }
            if($usertype == 'ba') {
                $databas = Databa::all();
                $datafms = Datafm::all();
                $datafws = Datafw::all();
                $datarhs = Datarh::all();
                $datavcs = Datavc::all();
                $user = User::find(1);
                return view('ba.indew',compact('databas','datafms','datafws','datarhs','datavcs','user'));
            }
            if($usertype == 'fn') {
                $datafms = Datafm::all();
                $datafws = Datafw::all();
           

                return view('fn.index',compact('datafws','datafms'));
            }
            if($usertype == 'rh') {
                $datarhs = Datarh::all();
                $user = User::find(1);
                return view('rh.index',compact('datarhs','user'));
            }
            if($usertype == 'vc') {
                $datavcs = Datavc::all();
                $datavcs12 = Datavc12::all();
                $user = User::find(1);
                return view('vc.index',compact('datavcs','user','datavcs12'));
            }
            else
            {
                return redirect()->back();
            }
        }
    }
}
