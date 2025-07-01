<?php

namespace App\Http\Controllers;

use App\Models\CalendarSchedule;

use Illuminate\Http\Request;

class CalendarScheduleController extends Controller
{
    //
    public function index()
    {
        return view('admin.calendar.index');
    }

    // public function events()
    // {
    //     $events = CalendarSchedule::select('id', 'title', 'start', 'end', 'description')
    //         ->get()
    //         ->map(function ($event) {
    //             return [
    //                 'id' => $event->id,
    //                 'title' => $event->title,
    //                 'start' => $event->start,
    //                 'end' => $event->end,
    //                 'description' => $event->description,
    //             ];
    //         });

    //     return Response::json($events);
    // }

    public function getEvents(Request $request)
    {
        $events = CalendarSchedule::all();

        $events  = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start->toDateString(),
                'end' => $event->end->toDateString(),
                'description' => $event->description,
            ];
        });

        return response()->json($events);
    }
}
