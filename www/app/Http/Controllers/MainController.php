<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\City;
use App\Models\Color;
use App\Models\Course;
use App\Models\Delivery;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\Teacher;
use App\Models\Type;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $application = Application::all();
        $events = Event::all();
        $payments = Payment::all();
        $teachers = Teacher::all();
        $subscriptions = Subscription::all();
        $reviews = Review::all();
        $courses = Course::all();
        return view('index', [
            'application' => $application,
            'events' => $events,
            'payments' => $payments,
            'teachers' => $teachers,
            'subscriptions' => $subscriptions,
            'reviews' => $reviews,
            'courses' => $courses,
        ]);
    }

    public function teacherShow()
    {
//        return view('')
    }

}
