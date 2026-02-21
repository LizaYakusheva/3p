<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function application(ApplicationRequest $request)
    {

        Application::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'event_id' => $request->eventId,
            'date' => $request->date,
            'payment_id' => $request->paymentId,
        ])->save();

        return redirect('/');
    }
}
