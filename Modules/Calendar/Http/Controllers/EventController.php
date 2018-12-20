<?php

namespace Modules\Calendar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Calendar\Entities\Event;
use Modules\Calendar\Entities\Room;
use Modules\Calendar\Entities\Reservation;
use Illuminate\Support\Facades\Auth;
use Image;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $event = Event::all();
        $rs = Reservation::all();
        // dd($r);
        return view('calendar::create',compact('rs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // $r = Reservation::all();
        // dd($r);
        return view('calendar/admin/calendrier', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $event = new Event;
        // $event->title = $request->title;
        // $event->user_id = Auth::id();
        // $event->start_date =$request->start_date;
        // $event->end_date = $request->end_date;
        // $event->categorie=$request->categorie;
        // $event->description=$request->description;
        // if($request->hasFile('image')){
        //         $image = $request->file('image');
        //         $filename = time().'.'.$image->getClientOriginalExtension();
        //         $location =  public_path('image/'.$filename);
        //         Image::make($image)->resize(800, 400)->save($location);
        //         $event->image = $filename;
       
        //     } 
        //     $event->save();
        //     $room = New Room;
        // $room->salle = $request->salle;
        // $room->etage = $request->etage;
        // $room->save();

        // $reservation = New Reservation;
        
        // $reservation->event_id = $event->id;
        // $reservation->room_id = $room->id;
        // // dd($reservation);
        // $reservation->save();
        session_start();
        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => ['dateTime' => $startDateTime],
                'end_date' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
                ]);
            $results = $service->events->insert($calendarId, $event);
            if (!$results) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
         dd(   $results = $service->events->insert($calendarId, $event));

        return redirect('calendar/admin/calendrier')->with("Success", "nickel");
        }
    }
    public function addroom(Request $request){
   
       
        // $room = New Room;
        // $room->salle = $request->salle;
        // $room->etage = $request->etage;
        // // $room->events()->associate($event);
        // $room->save();
        
        $reservation = New Reservation;
        
        $reservation->event_id = $event->id;
        $reservation->room_id = $room->id;
        // dd($reservation);
        $reservation->save();
    }
    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $events=Event::where('id', '=', $id)->get();
        // dd($calendar_event);
        return view('calendar::show',compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        // dd($event);

        return view('calendar::edit' ,compact('event'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
          $event = Event::find($id);
          $event->title = $request->get('title');
          $event->start_date = $request->get('start_date');
          $event->end_date = $request->get('end_date');
          $event->description = $request->get('description');
          $event->categorie = $request->get('categorie');
        //   dd($event);
          if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location =  public_path('image/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $event->image = $filename;
   
        } 

          $event->save();
          return redirect('calendar/admin/calendrier')->with("Success", "nickel");
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        $room = Room::find($id);
        $room->delete();
        $event = Event::find($id);
        $event->delete();
        echo "ceci a bien etais suprimé";
    }
}
