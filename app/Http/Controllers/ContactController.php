<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('admin.contact');
    }

    public function send(Request $request)
    {
        # validazione dati
        $validateData = $request->validate([
            'full_name' => 'required | min: 3 | max: 100',
            'email' => 'required | email',
            'message' => 'required | min: 3'
        ]);

        # salvataggio dati nel database
        $contact = Contact::create($validateData);
        
        # visualizzazione mail anteprima
        // return (new ContactFormMailable($contact))->render();


        # invio della mail
        Mail::to('franco@example.it')
        ->send(new ContactFormMailable($contact));
        
        return redirect()
        ->back()
        ->with('message','email inviata con successo');

    }

}
    

