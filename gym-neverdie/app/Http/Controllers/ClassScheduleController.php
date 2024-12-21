<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $classSchedules = ClassSchedule::all();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.class_schedules.index', compact('classSchedules')); // Halaman untuk admin
        }
    
        if (Auth::user() && Auth::user()->hasRole('user')) {
            return view('user.class_schedules.index', compact('classSchedules')); // Menggunakan $pemesanan untuk view user
        }
    
        abort(403, 'Access denied.');
    }

    public function create()
    {
        return view('admin.class_schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'instructor' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        ClassSchedule::create($request->all());
        return redirect()->route('admin.class_schedules.index');
    }

    public function edit(ClassSchedule $classSchedule)
    {
        return view('admin.class_schedules.edit', compact('classSchedule'));
    }

    public function update(Request $request, ClassSchedule $classSchedule)
    {
        $request->validate([
            'class_name' => 'required',
            'instructor' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $classSchedule->update($request->all());
        return redirect()->route('admin.class_schedules.index');
    }

    public function show(ClassSchedule $classSchedule)
{
    if (Auth::user()->hasRole('admin')) {
        return view('admin.class_schedules.show', compact('classSchedule')); // Halaman untuk admin
    }

    if (Auth::user() && Auth::user()->hasRole('user')) {
        return view('class_schedules.show', compact('classSchedule')); // Halaman untuk user
    }

    abort(403, 'Access denied.');

}

    public function destroy(ClassSchedule $classSchedule)
    {
        $classSchedule->delete();
        return redirect()->route('class_schedules.index');
    }
}
