<?php

namespace App\Http\Controllers;

use App\Mail\RemoveUser;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
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
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/edit-student/' . $row->id . '" class="edit btn btn-success btn-sm">Edit</a> <a href="/delete-student/' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function editStudents($id)
    {
        $data = Student::where('id', '=', $id)->first();
        return view('edit-student', ['data' => $data]);
    }

    public function verifyStudents()
    {
        return view('verify');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6',
        ]);
        $id = $request->id;
        $user = Student::where('id', '=', $id)->first();
        if($user->otp = $request->otp){
            $user->is_verified=1;
            $user->otp=NULL;
            $user->save();
            return redirect('student')->with("success", "data added successfully");
        }
        return redirect('student')->with("success", "data added successfully but student not verified.");
    }

    public function deleteStudents($id)
    {
        $data = Student::where('id', '=', $id)->first();
        Student::where('id', '=', $id)->first()->delete();
        Mail::to($data->email)->send(new RemoveUser($data));
        return redirect()->back()->with("success", "data delete successfully");
    }

    public function addStudents()
    {
        return view('add-student');
    }

    public function updateStudents(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'phone' => 'required | digits_between:10,12 | numeric',
            'dob' => 'required',
        ]);
        $id = $request->id;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $username = $request->username;
        $phone = $request->phone;
        $dob = $request->dob;
        Student::where('id', '=', $id)->update([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'username' => $username,
            'phone' => $phone,
            'dob' => $dob,
        ]);
        return redirect()->back()->with("success", "data update successfully");
    }

    public function createStudents(Request $request)
    {
        $request->validate([
            'firstname' => 'required |min:4|max:15',
            'lastname' => 'required |min:4|max:15',
            'email' => 'required|email',
            'username' => 'required',
            'phone' => 'required | digits_between:10,12|numeric',
            'dob' => 'required',
        ]);
        $student = new Student();
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $username = $request->username;
        $phone = $request->phone;
        $dob = $request->dob;
        $subscription = $student->subscriptiondays(365);
        // DB::table('students')->insert([
        //     'firstname'=>$firstname,
        //     'lastname'=>$lastname,
        //     'email'=>$email,
        //     'username'=>$username,
        //     'phone'=>$phone,
        //     'dob'=>$dob,
        // ]);

        $student->firstname = $firstname;
        $student->lastname = $lastname;
        $student->email = $email;
        $student->username = $username;
        $student->phone = $phone;
        $student->dob = $dob;
        $student->subscription = $subscription;
        $student->save();
        // return redirect('student')->with("success", "data added successfully");
        return redirect('verify')->with('data', $student);
    }
}