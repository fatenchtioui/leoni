<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Com;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Importez la classe DB pour utiliser les requêtes SQL

class ComController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validation might be required here
    
        // Récupérez les destinataires en fonction du type d'utilisateur
        $recipients = User::where('usertype', $request->recipient_type)->get();
    
        // Parcourez les destinataires et envoyez-leur le message
        foreach ($recipients as $recipient) {
            Com::create([
                'sender_id' => auth()->id(),
                'recipient_id' => $recipient->id,
                'message_content' => $request->message_content,
            ]);
        }
    
        return redirect()->back()->with('success', 'Message sent successfully!');
    }  
    public function getMessages()
    {
        $messages = Com::where('recipient_id', auth()->id())->get();
        return view('messages.index', compact('messages'));
    }
}
