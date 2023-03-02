<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EventIndexResource;
use App\Http\Resources\EventDetailResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with(['user:id,name','category:id,name'])->get();
        return EventIndexResource::collection($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'title' => ['required', 'unique:events', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => ['required', ],
        ]);

        // if ($request->thumbnail) {
        //     $extension = $request->file('thumbnail')->getClientOriginalExtension();
        //     $newName = Str::words($request->title, 3) . '-' . now()->timestamp . '.' . $extension;
        //     $request->file('thumbnail')->storeAs('images/article', $newName);
        // }

        $event = Event::create([
            'title' => $request->title,
            // 'user_id' => Auth::id(),
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'body' => $request->body,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'summary' => Str::of(Str::words($request->body, 23)),
            'status' => $request->status,
            'thumbnail' => $request->thumbnail,
            // 'thumbnail' => $request['thumbnail'] = $newName,
        ]);


        return new EventDetailResource($event->loadMissing('user:id,name','category:id,name'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with(['user:id,name','category:id,name'])->findOrFail($id);
        return new EventDetailResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => ['required', ],
        ]);

        $valueEvent =[
            'title' => $request->title,
            // 'user_id' => Auth::id(),
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'body' => $request->body,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'summary' => Str::of(Str::words($request->body, 23)),
            'status' => $request->status,
            'thumbnail' => $request->thumbnail,
        ];

        $newName = null;
        if ($request->hasFile('thumbnail')) {
            if ($event->thumbnail) {
                unlink('storage/images/article/'.$event->thumbnail);
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $newName = Str::words($request->title, 3) . '-' . now()->timestamp . '.' . $extension;
                $request->file('thumbnail')->storeAs('images/article', $newName);
            }
            $values['thumbnail'] = $newName;
        }

        $event->update($valueEvent);

        return new EventDetailResource($event->loadMissing('user:id,name','category:id,name'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //   if ($event->thumbnail) {
        //         unlink('storage/images/article/'.$event->thumbnail);
        //     }
        $event->delete();
        return new EventDetailResource($event->loadMissing('user:id,name','category:id,name'));
    }
}
