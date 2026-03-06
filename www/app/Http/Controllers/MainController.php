<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\City;
use App\Models\Color;
use App\Models\Course;
use App\Models\Delivery;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\Teacher;
use App\Models\Type;
use App\Services\CartService;
use Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(
        protected CartService $cartService
    )
    {
    }

    public function index()
    {
        $application = Application::all();
        $events = Event::all();
        $payments = Payment::all();
        $teachers = Teacher::all();
        $subscriptions = Subscription::all();
        $reviews = Review::all();
        $courses = Course::all();
        $products = Product::all();
        return view('index', [
            'application' => $application,
            'events' => $events,
            'payments' => $payments,
            'teachers' => $teachers,
            'subscriptions' => $subscriptions,
            'reviews' => $reviews,
            'courses' => $courses,
            'products' => $products,
            'cartService' => $this->cartService,
        ]);
    }

    public function reviews(Request $request)
    {
        Auth::user()->reviews()->create($request->all());
        return back();
    }

}
