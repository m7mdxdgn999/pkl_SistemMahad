<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $students= Student::paginate(3);

        // $students=DB::table('students')->get();

        return view ('students.index', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Store(Request $request)
    {       
        //cek apakah sudah tertangkap via id
        // dd($request->all());
        
         //validasi
         $request->validate([
            'nama_mahasiswa' => 'required',
            'nim' => 'required|unique:students|max:14',
            'fakultas_jurusan_semester' => 'required ',
            'tempat_tanggal_lahir' => 'required ',
            'no_hp_mahasantri' => 'required ',
            'jalur_masuk' => 'required ',
            'nama_org_tua' => 'required ',
            'no_hp_org_tua' => 'required ',
            'alamat_lengkap' => 'required ',
            'nama_mabna' => 'required '
         ],
         [
            'nama_mahasiswa.requied'=>'Harus diisi'
         ]
    );
        // return $request->all();
        //insert data ke table, laravel sudah tau table yg mana krna bhs inggris "student"
        Student::create($request->all());

        //alihkan halaman ke halaman admin klo sudah tersimpan
        return redirect()->route('student.index')->with('message', 'Data berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function Edit(Student $student)
    {
        //
       
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request, Student $student)
    {
        //cek apakah sudah tertangkap via id
        // dd($request->all());

        // eksekusi update
        $student->update($request->all());
        return redirect()->route('student.index')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function Destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
