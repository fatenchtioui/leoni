<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Datavc;
use App\Models\User;
use App\Models\Datacv12;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;
class DatavcController extends Controller
{
    public function datt()
    {
        return view('vc.index');
    }
    public function dattt()
    {
        return view('vc.home');
    }
    public function ajou()
    {
        return view('vc.ajouter');
    }
public function crea(Request $request)
{
    // Récupérer l'utilisateur actuellement connecté
    $user = Auth::user();

    // Récupérer la date de début et de fin de la semaine actuelle
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    // Vérifier si l'utilisateur a déjà publié un article cette semaine
    $lastdatat = $user->datavcs()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->latest()->first();

    if ($lastdatat) {
        // Calculer la différence de temps entre maintenant et la dernière publication
        $timeDifference = now()->diffInHours($lastdatat->created_at);

        // Vérifier si moins de 24 heures se sont écoulées depuis la dernière publication
        if ($timeDifference < 24) {
            // Afficher un message d'erreur à l'utilisateur
            return redirect('/ajouu')->withInput()->with('error', 'Vous ne pouvez publier qu\'un article toutes les 24 heures.');
        }
    }

    // Validation des champs
    $request->validate([
        'hc_direct' => 'required',
        'hc_indirect' => 'required',
        'abs_p' => 'required',
        'abs_np'=> 'required',
        'fluctuation' => 'required',                
    ]);

    // Enregistrez les données dans la base de données
    $data = new Datavc();

    // Assignez les valeurs des champs
    $data->user_id = $user->id;
    $data->hc_direct = $request->input('hc_direct');
    $data->hc_indirect = $request->input('hc_indirect');
    $data->abs_p = $request->input('abs_p');
    $data->abs_np = $request->input('abs_np');
    $data->fluctuation = $request->input('fluctuation');

    // Enregistrez les données
    $data->save();

    // Redirigez l'utilisateur vers une page appropriée après l'enregistrement des données
    return redirect('/ajouu')->with('status', 'Les données ont été insérées avec succès');
}

    public function mes(){
        return view('vc.message');
    }
    public function page(){
        return view('vc.page');
    }
}

