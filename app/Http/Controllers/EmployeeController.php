<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use response;


class EmployeeController extends Controller
{
    public function index()
    {
    	return view('index');
    } 

    public function getData(){
    	$users = Employee::select(['id', 'name', 'city', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a id="'.$user->id.'" href="#" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a id="'.$user->id.'" href="#" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            // ->editColumn('id', ' {{$id}}')
            ->make(true);
    }

    public function saveData(Request $request)
    {	

    	$validator = Validator::make($request->all(), [
           'name' => 'required|min:3',
           'city' => 'required|string|max:50',
       ]);
        
       if ($validator->fails()) {
            return  $validator->messages()->first();
       }
            
  
			$employee = new Employee();
	    	 $employee->name = $request->name;
	    	 $employee->city = $request->city;
	    	 $employee->created_at=date('Y-m-d H:m:s');
	    	 $employee->updated_at=date('Y-m-d H:m:s');
	    	 $employee->save(); 

			 return "200";
    }


    public function editData($id)
    {
      $employee = Employee::find($id);
      if($employee)
      {
        return $employee;
        return  json_encode(array("res"=>$employee));

      }
      else
        return "404";
    }


    public function updateData(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
           'name' => 'required|min:3',
           'city' => 'required|string|max:50',
       ]);
        
       if ($validator->fails()) {
            return  $validator->messages()->first();
       }

      else{
        $employee = Employee::find($id);
        if($employee){
          $employee->name = $request->name;
          $employee->city = $request->city;
          $employee->update();

          return "200";
        }
        else
        return "404";
      }

    }


    public function deleteData($id)
    {
      $employee = Employee::find($id);
      $employee->delete();

      return "200";
    }



	
}
