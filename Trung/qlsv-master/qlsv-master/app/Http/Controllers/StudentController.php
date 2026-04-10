<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        
   $request->validate([
    'ma_sv' => 'required',
    'ho_ten' => 'required',
    'email' => 'required|email',
    'lop' => 'required'
]);

    Student::create($request->all());
    return redirect('/students');
    }

    public function edit($id)
    {
        $sv = Student::find($id);
        return view('students.edit', compact('sv'));
    }

    public function update(Request $request, $id)
    {
        $sv = Student::find($id);
        $sv->update($request->all());
        return redirect('/students');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/students');
    }
}