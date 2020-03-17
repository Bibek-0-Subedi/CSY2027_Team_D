<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Exception;

class StudentController extends Controller
{
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    public function create()
    {
        return view('student.add');
    }

    public static function storeCSV($data)
    {
        try{
            $student = new Student($data);
            $student->save();
        }catch(Exception $e){

        }
    }

    public function store()
    {

        $student = new Student();

        //Store Code
        try{
            
        }catch(Exception $e){

        }
        return redirect('/student');
    }

    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);
    }

    public function update(Student $student)
    {
        //Update Code
        return redirect($student->path());
    }

    public function destory(Student $student)
    {
        # code...
    }
}
