<?php

namespace App\Http\Controllers\Frontend;

use DateTime;
use App\Models\Dog;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppointmentNext7Days;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointemnts = AppointmentNext7Days::all();
        return view('frontend.appointments.index', compact('appointemnts'));
    }

    public function add()
    {
        if(Auth::check()){
            $dogs = Dog::where('user_id', Auth::id())->get();
            return view('frontend.appointments.add', compact('dogs'));
        }
        else{
            return redirect('appointments')->with(['status' => "Login to make an appointment"]);
        }
    }

    public function insert(Request $request)
    {
        $type = $request->input('type');
        $start = $request->input('start');
        if(date('H', strtotime($start)) < 9 || date('H', strtotime($start)) > 16){
            return redirect('make-appointments')->with('status', "Our work hours are from 9 to 17, pls select valid time");
        }
        if($type == '1'){
            $finish =  new DateTime($start);
            $finish->modify('+45 minutes');
        }
        if($type == '2'){
            $finish =  new DateTime($start);
            $finish->modify('+90 minutes');
        }
        $appointemnt_check = Appointment::where('start', '<=', $start)->where('finish', '>=', $start)->first();
        if($appointemnt_check){
            return redirect('appointments')->with('status', "That period is already resrved");
        }
        else{
            $appointemnt = new Appointment();
            $appointemnt->type = $type;
            $appointemnt->start = $start;
            $appointemnt->finish = $finish;
            $appointemnt->dog_id = $request->input('dog_id');
            $appointemnt->user_id = Auth::id();
            $appointemnt->save();
    
            return redirect('appointments')->with('status', "Appointments successfully made");
        }
    }
    
    public function myappointments()
    {
        $appointments = Appointment::where('user_id', Auth::id())->where('start', '>=', date('y-m-d h:i:s'))->get();
        return view('frontend.appointments.user_appointments', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect('/my-appointments')->with('status', "Appointment Deleted Successfully");
    }

    public function admin_index()
    {
        $appointemnts = Appointment::where('start', '>=', date('y-m-d h:i:s'))->get();
        return view('admin.appointments.index', compact('appointemnts'));
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.appointments.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $type = $request->input('type');
        $start = $request->input('start');

        if(date('H', strtotime($start)) < 9 || date('H', strtotime($start)) > 16){
            return redirect('edit-appointment/'. $id)->with('status', "Our work hours are from 9 to 17, pls select valid time");
        }
        if($type == '1'){
            $finish =  new DateTime($start);
            $finish->modify('+45 minutes');
        }
        if($type == '2'){
            $finish =  new DateTime($start);
            $finish->modify('+90 minutes');
        }
        $appointemnt_check = Appointment::where('start', '<=', $start)->where('finish', '>=', $start)->first();
        if($appointemnt_check){
            return redirect('edit-appointment/'. $id)->with('status', "That period is already resrved");
        }
        else{
            $appointment->type = $type;
            $appointment->start = $start;
            $appointment->finish = $finish;
            $appointment->update();
    
            return redirect('admin-appointments')->with('status', "Appointment successfully edited");
        }
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect('/admin-appointments')->with('status', "Appointment Deleted Successfully");
    }

}