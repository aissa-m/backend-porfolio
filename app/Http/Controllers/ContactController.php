<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use Mail; // Importa la fachada Mail de Laravel

// Se ha modificado el nombre de este arachivo.
class ContactController extends Controller
{
    public function send(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'telef' => $request->telef
        ];

        // Enviar correo al propietario del sitio
        Mail::to('issa@equipodeimagen.com')->send(new ContactMail($details));

        // Enviar correo de confirmación al usuario
        Mail::to($request->email)->send(new ConfirmationMail($details));

        return response()->json(['message' => 'Correo enviado correctamente']);
    }
}
