<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    /**
     * Display a listing of the resource deleted.
     */
    public function trashed()
    {
        return view('students.trashed', [
            'students' => Student::onlyTrashed() -> get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create', ['courses' => Course::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        $student -> courses() -> attach($request -> course);
        Session::flash('success', 'Student created succesfully');
        return redirect() -> route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student -> update($request -> validated());
        return redirect() -> route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::withTrashed() -> where('id', $id) -> first();
        $student -> forceDelete();
        Session::flash('success', 'Student deleted succcessfully');
        return redirect() -> route('students.index');
    }

    public function trash($id) {
        Student::destroy($id);
        Session::flash('success', 'Student deleted succcessfully');
        return redirect() -> route('students.trashed');
    }

    public function restore($id) {
        $student = Student::withTrashed() -> where("id", $id) -> first();
        $student -> restore();
        Session::flash('success', 'Student restored succcessfully');
        return redirect() -> route('students.index');
    }
}
