<?php

namespace App\Http\Controllers;
use App\Contact;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;



class ContactController extends Controller
{
    //для отображения формы
    public function showForm()
    {
        return view('contact');  
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Ошибка при отправке данных'], 400);
        }

        $contact = Contact::create($validator->getData()); // или $request->only(['name', 'phone', 'email'])

        Mail::send([], [], function ($message) use ($contact) {
            $message->to('oddonenso@gmail.com')  // Адрес получателя
                ->subject('Новый контакт с формы')
                ->setBody(
                    '<p>Новый контакт с формы:</p>
                    <ul>
                        <li>Имя: ' . $contact->name . '</li>
                        <li>Телефон: ' . $contact->phone . '</li>
                        <li>Email: ' . $contact->email . '</li>
                    </ul>',
                    'text/html'
                );
        });

        return response()->json(['message' => 'Данные успешно отправлены!'], 200);
    }

}
