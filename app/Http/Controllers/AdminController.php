<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Datavc12;
class AdminController extends Controller
{
    public function ajoo()
    {
        return view('/ajouter');
    }
    public function add_user(Request $request)
    {
        // Vérifiez d'abord si l'e-mail est déjà utilisé
        $existingUser = User::where('email', $request->email)->first();
    
        if ($existingUser) {
            // L'utilisateur existe déjà, vous pouvez le supprimer
            $existingUser->delete();
        }
    
        // Créez un nouvel utilisateur
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->usertype = $request->usertype;
        $user->save();
    
        return redirect()->back()->with('message', 'Utilisateur ajouté avec succès');
    }
    
    
public function delete_user($id)
{
    $user=user::find($id);
    $user->delete();
    return redirect()->back()->with('message','userdelete succcessfully');

}
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt|max:2048', // Limite de taille du fichier à 2 Mo
    ]);

    if ($request->file('file')->isValid()) {
        $path = $request->file('file')->getRealPath();

        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                Datavc12::create([
                    'hc_direct' => $data[0],
                    'hc_indirect' => $data[1],
                    'abs_p' => $data[2],
                    'abs_np' => $data[3],
                    'fluctuation' => $data[4],
                ]);
            }
            fclose($handle);
        }

        return redirect()->back()->with('success', 'Le fichier CSV a été importé avec succès.');
    } else {
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation du fichier.');
    }
}

}
