<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'Student Page',
            'students' => Student::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', [
            'title' => 'Create Student',
            'departments' => Department::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'nim' => 'required|size:12',
                'department_id' => 'required',
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter',

                'nim.required' => 'NIM wajib diisi',
                'nim.size' => 'NIM harus terdiri dari :max karakter',

                'department_id.required' => 'Program studi wajib diisi',
            ]
        );

        Student::create($validated);
        return to_route('student.index')->withSuccess('Data berhasil ditambahkan');
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
        return view('student.edit', [
            'title' => 'Edit Student',
            'departments' => Department::latest()->get(),
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'nim' => 'required|size:12',
                'department_id' => 'required',
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter',
                'nim.required' => 'NIM wajib diisi',
                'nim.size' => 'NIM harus terdiri dari :max karakter',
                'department_id.required' => 'Program studi wajib diisi',
            ]
        );

        $student->update($validated);
        return to_route('student.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('student.index')->withSuccess('Data berhasil dihapus');
    }
}
