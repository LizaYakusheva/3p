<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Teacher;
use App\Models\Type;
use Illuminate\Http\Request;
use Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', [
            'events' => $events
        ]);
    }
    public function create()
    {
        $types = Type::all();
        $teachers = Teacher::all();
        return view('admin.events.create', [
            'types' => $types,
            'teachers' => $teachers,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid('pic_') . '.' . $image->extension();
            $image->storeAs('products', $imageName, 'public');
        }

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => isset($imageName )? 'products/' . $imageName : null,
            'price' => $request->price,
            'teacher_id' => $request->teacherId,
            'date' => $request->date,
            'time' => $request->time,
            'type_id' => $request->typeId,
        ])->save();

        return redirect(route('events.index'));
    }

    public function show(string $id)
    {
        $event = Event::find($id);
        return view('eventShow', [
            'event' => $event,
        ]);
    }

    public function edit(string $id)
    {
        $event = Event::find($id);
        $types = Type::all();
        $teachers = Teacher::all();
        return view('admin.events.edit', [
            'event' => $event,
            'types' => $types,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if ($request->destroyPhoto){
            Storage::disk('public')->delete($event->image);
            $event->update([
                'image' => null
            ]);
        }

        if ($request->hasFile('image')) {
            if ($event->image){
                Storage::disk('public')->delete($event->image);
            }
            $image = $request->file('image');
            $imageName = uniqid('pic_') . '.' . $image->extension();
            $image->storeAs('products', $imageName, 'public'); //и загружаем его в хранилище
        }

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => isset($imageName )? 'products/' . $imageName : $event->image,
            'price' => $request->price,
            'teacher_id' => $request->teacherId,
            'date' => $request->date,
            'time' => $request->time,
            'type_id' => $request->typeId,
        ]);

        return redirect(route('events.index'));
    }

    public function destroy(string $id)
    {
        Event::destroy($id);
        return redirect(route('cabinet'));
    }

}
