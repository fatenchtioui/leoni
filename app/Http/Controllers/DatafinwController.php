<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Datafm;
use App\Models\Datafw;
use App\Models\User;


use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;

class DatafinwController extends Controller
{
    public function data()
    {
        return view('fn.home');
    }
    public function da()
    {$datafws=Datafw::all();
        $datafms = Datafm::all();

        return view('fn.index',compact('datafws','datafms'));
    }
    public function ajouter_data()
    {
        return view('fn.ajouter');
    }
    public function ajouter_dat()
    {
        return view('fn.ajoute');
    }
    public function create(Request $request)
    {
        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();
    
        // Récupérer le numéro de la semaine actuelle
        $currentWeek = now()->weekOfYear;
    
        // Vérifier si l'utilisateur a déjà publié un article cette semaine
        $lastdata = $user->datafinws()->where('week_number', $currentWeek)->latest()->first();

        if ($lastdata) {
            // Calculer la différence de temps entre maintenant et la dernière publication
            $timeDifference = now()->diffInHours($lastdata->created_at);
    
            // Vérifier si moins de 24 heures se sont écoulées depuis la dernière publication
            if ($timeDifference < 24) {
                // Afficher un message d'erreur à l'utilisateur
                return redirect('/ajouter')->back()->withInput()->with('error', 'Vous ne pouvez publier qu\'un article toutes les 24 heures.');
            }
        }
    
        // Validation des champs
        $request->validate([
            'week_number' => 'required',
            'date' => 'required',
            'nh_budget' => 'required',
            'nh_actual' => 'required',
            'efficience_budget' => 'required',
            'efficience_actual' => 'required',
        ]);
    
        // Enregistrez les données dans la base de données
        $data = new Datafw();
    
        // Assignez les valeurs des champs
        $data->week_number = $request->input('week_number');
        $data->date = $request->input('date');
        $data->nh_budget = $request->input('nh_budget');
        $data->nh_actual = $request->input('nh_actual');
        $data->efficience_budget = $request->input('efficience_budget');
        $data->efficience_actual = $request->input('efficience_actual');
        $user = Auth::user();
        // Enregistrez les données pour l'utilisateur connecté
        $user->datafinws()->save($data);

    
        // Redirigez l'utilisateur vers une page appropriée après l'enregistrement des données
        return redirect('/ajouter')->with('status', 'Les données ont été insérées avec succès');
    }
    
    public function store(Request $request)
    {
        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();
    
        // Vérifier si l'utilisateur a déjà publié un article ce mois-ci
        $currentMonth = now()->month;
        $lastData = $user->datafinms()->whereMonth('created_at', $currentMonth)->first();
    
        if ($lastData) {
            // Afficher un message d'erreur à l'utilisateur
            return redirect('/ajoute')->back()->withInput()->with('error', 'Vous ne pouvez publier qu\'un article par mois.');
        }
    
        // Validation des champs
        $request->validate([
            'current_month' => 'required',
            'sales_budget' => 'required',
            'sales_actual' => 'required',
        ]);
    
        // Enregistrez les données dans la base de données
        $data = new Datafm();
        $data->user_id = $user->id;
        $data->current_month = $request->input('current_month');
        $data->sales_budget = $request->input('sales_budget');
        $data->sales_actual = $request->input('sales_actual');
        $data->save();
    
        // Redirigez l'utilisateur vers une page appropriée après l'enregistrement des données
        return redirect('/ajoute')->with('status', 'Les données ont été insérées avec succès');
    }
    
    public function mess(){
        return view('fn.message');
    }
}
