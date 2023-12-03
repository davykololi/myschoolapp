<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::get();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        try{
            $event->name = $request->name;
            $event->description = $request->description;
            $event->startDateTime = $request->start_time;
            $event->endDateTime = $request->end_time;
            $event->startDate = $request->start_date;
            $event->endDate = $request->end_date;
            $event->save();

            return response()->json([
                'message' => 'Event saved successfully',
                'data' => $event,
            ],201);
            DB::commit();
        } catch(\Exception $e){
            console.log($e->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $eventId = Event::get()->first()->id;
        $id = $eventId;
        $event = Event::find($id);
        
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $eventId = Event::get()->first()->id;
        $id = $eventId;
        $event = Event::find($id);

        DB::beginTransaction();
        try{
            if($event){
                $input = $request->all();
                $event->update($input);

                return response()->json([
                    'message' => 'Event updated successfully',
                    'data' => $event,
                ],200);
                DB::commit();
            } catch(\Exception $e){
                DB::rollBack();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eventId = Event::get()->first()->id;
        $id = $eventId;
        $event = Event::find($id);

        DB::beginTransaction();
        try{
            if($event){
                $event->delete();

                return response()->json([
                    'message' => 'Event deleted successfully',
                ],204);
                DB::commit();
            } catch(\Exception $e){
                DB::rollBack();
            }
        }
    }
}
