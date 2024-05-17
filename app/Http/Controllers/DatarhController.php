<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datarh;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Notification;
use App\Notifications\DatarhNotification;
class DatarhController extends Controller
{
    public function dat()
    
    {$datarhs= Datarh::all();
        return view('rh.index',compact('datarh'));
    }
    public function datt()
    {
        return view('rh.home');
    }
    public function ajo()
    {
        return view('rh.ajouter');
    }
    public function creat(Request $request)
    {
        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();
    
        // Récupérer la date de début et de fin de la semaine actuelle
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        // Vérifier si l'utilisateur a déjà publié un article cette semaine
        $lastdatat = $user->datarhs()->whereBetween('created_at', [$startOfWeek, $endOfWeek])->latest()->first();
    
        if ($lastdatat) {
            // Calculer la différence de temps entre maintenant et la dernière publication
            $timeDifference = now()->diffInHours($lastdatat->created_at);
    
            // Vérifier si moins de 24 heures se sont écoulées depuis la dernière publication
            if ($timeDifference < 24) {
                // Afficher un message d'erreur à l'utilisateur
                return redirect('/ajoute')->back()->withInput()->with('error', 'Vous ne pouvez publier qu\'un article toutes les 24 heures.');
            }
        }
         // Validation des champs
         $request->validate([
            'client_forcast_s1' => 'required',
            'production_calendar' => 'required',
            'customer_calendar' => 'required',
            'customer_consumption_last_12_week' => 'required',
            'stock_plant_tic_tool' => 'required',
        ]);

        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();

        // Enregistrez les données dans la base de données
        $data = new Datarh();
        $data->user_id = $user->id;
        // Assignez les valeurs des champs
        $data->client_forcast_s1 = $request->input('client_forcast_s1');
        $data->production_calendar = $request->input('production_calendar');
        $data->customer_calendar = $request->input('customer_calendar');
        $data->customer_consumption_last_12_week = $request->input('customer_consumption_last_12_week');
        $data->stock_plant_tic_tool = $request->input('stock_plant_tic_tool');

        // Enregistrez les données
        $data->save();

        // Envoyez la notification à tous les utilisateurs

        // Redirigez l'utilisateur vers une page appropriée après l'enregistrement des données
        return redirect('/ajou')->with('status', 'Les données ont été insérées avec succès');
    }
   public function messag(){
    return view('rh.message');
   }
}
