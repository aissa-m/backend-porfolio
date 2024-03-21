<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use Mail; // Importa la fachada Mail de Laravel

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $details = [
            'email' => $request->email,
            'message' => $request->message
        ];

        // Enviar correo al propietario del sitio
        Mail::to('issa@equipodeimagen.com')->send(new ContactMail($details));

        // Enviar correo de confirmación al usuario
        Mail::to($request->email)->send(new ConfirmationMail($details));

        return response()->json(['message' => 'Correo enviado correctamente']);
    }

}
