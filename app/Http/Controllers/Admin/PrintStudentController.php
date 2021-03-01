<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class PrintStudentController extends Controller
{
    public function Pdf(Student $student)
    {
        return view('students.pdf',compact('student'));
    }
}
