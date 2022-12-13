<?php
namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('student');
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return FacadesDataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/edit-student/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="/delete-student/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function editStudents($id)
    {
        $data = Student::where('id','=',$id)->first();
        return view('edit-student',['data' => $data]);
    }
    public function deleteStudents($id)
    {
        $data = Student::where('id','=',$id)->first();
        Student::where('id','=',$id)->first()->delete();
        Mail::to($data->email)->send(new SendMail($data));
        return redirect()->back()->with("success","data delete successfully");
    }
 
    public function updateStudents(Request $request)
    {
    //    return "Hi";
    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'username'=>'required',
        'phone'=>'required',
        'dob'=>'required',
    ]);
    $id=$request->id;
    $name=$request->name;
    $email=$request->email;
    $username=$request->username;
    $phone=$request->phone;
    $dob=$request->dob;
    Student::where('id','=',$id)->update([
        'name'=>$name,
        'email'=>$email,
        'username'=>$username,
        'phone'=>$phone,
        'dob'=>$dob,
    ]);
        return redirect()->back()->with("success","data update successfully");
    }
 
}