<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Mail\NewMessage;
use App\Mail\NewReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function show()
    {
        return view('contact');
        //trans('validation.required', ['attribute' => 'Тест']);
        //trans('messages.welcome');
    }

    public function store(CreateMessageRequest $request)
    {
        $mail = new NewMessage(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone'),
            $request->get('text'),
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', trans('messages.report.success'));

        return redirect()
            ->back();
    }
}
