<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Databa;
use App\Models\Datafm;
use App\Models\Datafw;
use App\Models\Datarh;
use App\Models\Datavc;


class BaController extends Controller
{
    public function aj()
    {$datav=Databa::all();
        return view('ba.ajouter',compact('datav'));
    }
    public function cre(Request $request)
    {
        // Validation des champs
        $request->validate([
            'validation' => 'required',
                           
           
        ]);



        // Enregistrez les données dans la base de données
        $data = new Databa();

        // Assignez les valeurs des champs
        $data->validation = $request->input('validation');
        
       

        // Enregistrez les données
        $data->save();

        // Redirigez l'utilisateur vers une page appropriée après l'enregistrement des données
        return redirect('/aj')->with('status', 'Les données ont été insérées avec succès');
    }
    public function afficher(){
        return view('ba.exp');
    }

    
    public function rh(){
        $data = Datarh::all();
        return view('ba.rh',compact('data'));
    }
    public function vc(){
        $datav = Datavc::all();
        return view('ba.vc',compact('datav'));
    }
    public function fin(){
        $datam = Datafm::all();
        $dataf = Datafw::all();
        return view('ba.fin',compact('dataf','datam'));
    }
    public function message(){
        return view('ba.message');
    }



public function generateCsv()
{
    // Récupérer les données de chaque modèle
    $data1 = Datafm::all();
    $data2 = Datafw::all();
    $data3 = Datarh::all();
    $data4 = Datavc::all();

    $filename = "Datafinancemonth.csv";
    $fp = fopen($filename, "w+");
    fputcsv($fp, array('current_month', 'sales_budget', 'sales_actual','nh_budget','date','nh_actual','efficience_budget','efficience_actual','week_number','stock_plant_tic_tool','customer_consumption_last_12_week','customer_calendar','production_calendar','client_forcast_s1','hc_direct','hc_indirect','abs_p','fluctuation','abs_np'));

    // Écrire les données de chaque modèle dans le fichier CSV
    foreach ($data1 as $row) {
        fputcsv($fp, array($row->current_month, $row->sales_budget, $row->sales_actual));
    }

    foreach ($data2 as $row) {
        fputcsv($fp, array( $row->date, $row->nh_budget, $row->nh_actual, $row->efficience_budget, $row->efficience_actual,$row->week_number));
    }

    foreach ($data3 as $row) {
        fputcsv($fp, array($row->client_forcast_s1, $row->production_calendar, $row->customer_calendar, $row->customer_consumption_last_12_week, $row->stock_plant_tic_tool));
    }

    foreach ($data4 as $row) {
        fputcsv($fp, array($row->hc_direct,$row->hc_indirect,$row->abs_p,$row->abs_np,$row->fluctuation));
    }

    fclose($fp);

    $headers = array('Content-Type' => 'text/csv');

    return response()->download($filename, 'Datafinancemonth.csv', $headers);
}
}