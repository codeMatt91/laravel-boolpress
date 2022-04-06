<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Qui prendo i dati inviati dal form
        $data = $request->all();

        // VALIDAZIONE
        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'message' => 'required',
            ],
            [
                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail non è valida',
                'message.required' => 'Il messaggio è obbligatorio',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        // Istanzio una mail e gli passo le informazioni che mi arrivano dal form, in questo un array con email e un messaggio
        $mail = new ContactMail($data);
        Mail::to(env('MAIL_ADMIN'))->send($mail);

        return response()->json($data);
    }
}
