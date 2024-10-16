<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EmployeeController extends Controller
{
    public function AllEmployee() {
        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    }

    public function AddEmployee() {
        return view('backend.employee.add_employee');
    }

    public function StoreEmployee(Request $request) {
        $validateData = $request->validate([
            'name' => "required|max:200",
            'email' => "required|unique:employees",
            'phone' => "required|max:200"
        ],
        [
            'name.required' => "Employee Name is required.",
            'email.required' => "Email is required.",
            'phone.required' => "Phone is required."
        ]);

        $image = $request->file('image');
        $save_url = null;

        if($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 300);
            $img->save(base_path('public/upload/employee/'.$name_gen));
            $save_url = 'upload/employee/'.$name_gen;
        }
        Employee::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
    }

    public function EditEmployee($id){

        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit_employee',compact('employee'));

    } 

    public function UpdateEmployee(Request $request){

        $employee_id = $request->id;

        if ($request->file('image')) {
        $manager = new ImageManager(new Driver());
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(300, 300);
        $img->save(base_path('public/upload/employee/'.$name_gen));
        $save_url = 'upload/employee/'.$name_gen;
        Employee::findOrFail($employee_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $save_url,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification); 
             
        } else{

            Employee::findOrFail($employee_id)->update([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification); 

        } // End else Condition  


    } 


    public function DeleteEmployee($id){

        $employee_img = Employee::findOrFail($id);
        $img = $employee_img->image;
        unlink($img);

        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } 
}
