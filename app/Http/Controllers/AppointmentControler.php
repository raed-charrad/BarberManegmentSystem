<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use App\Models\services;
use App\Models\appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppointmentControler extends Controller
{


    public function index(){

        $appointment = DB::table('appointments')
            ->join('users', 'appointments.idClient', '=', 'users.id')
            ->join('users as u', 'appointments.idStylist', '=', 'u.id')
            ->join('services', 'appointments.idServices', '=', 'services.id')
            ->select('appointments.status','appointments.id','services.title as title','appointments.appointmentDate','appointments.created_at','users.name as ClientName','u.name as StylistName','appointments.remark')
            ->get();
        return response()->json($appointment,200);
    }
    public function showAppointments(){
        $appointment = DB::table('appointments')
            ->join('users', 'appointments.idClient', '=', 'users.id')
            ->join('users as u', 'appointments.idStylist', '=', 'u.id')
            ->join('services', 'appointments.idServices', '=', 'services.id')
            ->select('appointments.status','appointments.id','services.title as title','appointments.appointmentDate','appointments.created_at','users.name as ClientName','u.name as StylistName','appointments.remark')
            ->where('appointments.idStylist','=',Auth::user()->id)
            ->get();
        return response()->json($appointment,200);
    }
    public function commition(){
        $commition=DB::table('appointments')
        ->join('services','appointments.idServices','=','services.id')
        ->join('users', 'appointments.idClient', '=', 'users.id')
        ->select('services.title as title','appointments.appointmentDate','users.name as ClientName','services.price as price')
        ->where('appointments.idStylist','=',Auth::user()->id)
        ->where('appointments.status','=',1)
        ->get();
        return response()->json($commition,200);

    }
    public function verify($id){
        $appointment=appointments::find($id);
        $appointment->status=1;
        $appointment->save();
    }
    public function inVerify($id){
        $appointment=appointments::find($id);
        $appointment->status=0;
        $appointment->save();
    }
    public function delete($id, Request $request){

        $appointment = appointments::find($id);
        $appointment->delete();
        return response()->json('appointment deleted!');
    }
    public function appointmentForm(Request $request) {
        // Form validation
        $this->validate($request, [
            'service' => 'required',
            'stylist' => 'required',
            'Date'=>'required',

         ]);
        //  Store data in database
        appointments::create([
            'idClient' =>Auth::user()->id,
            'idStylist'=>$request->input('stylist'),
            'idServices'=>$request->input('service'),
            'appointmentDate'=>$request->input('Date'),
            'remark'=>$request->input('comment')
        ]);
        $user = User::find( Auth::user()->id)->firstOrFail();
        $service = services::where( 'id','=',$request->input('service'))->firstOrFail();
        $stylist = User::where('id', '=', $request->input('stylist'))->firstOrFail();

        \Mail::send('appointmentMail', array(
            'Name' =>$user->name,
            'email' =>$user->email,
            'phone'=>$user->phone,
            'service' => $service->title,
            'stylist' => $stylist['name'],
            'Date' => $request->get('Date'),
            'comment' => $request->get('comment'),
        ), function($message) use ($user){
            $message->from($user->email);
            $message->to('admin@admin.com', 'Admin')->subject($user->name.' appointment');
        });
        return back()->with('success', 'We have received your appointment and would like to thank you for choosing  us.');
    }
}
