<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\String_;

class EmployeeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function create(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'cpf'           => 'required|min:11|max:11',
            'name'          => 'required',
            'occupation'    => 'required',
            'cellphone'     => 'required',
        ]);
        
        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $employee = Employee::create($request->all());

        return response()->json($employee,201);
    }

    public function update(Request $request, String $cpf)
    {
        $validated =  Validator::make($request->all(), [
            'cpf'           => 'required|min:11|max:11',
            'name'          => 'required',
            'occupation'    => 'required',
            'cellphone'     => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $employee = Employee::find($cpf);

        $employee->cpf = $request->cpf;
        $employee->name = $request->name;
        $employee->occupation = $request->occupation;
        $employee->cellphone = $request->cellphone;
        
        $employee->save();

        return response()->json($employee,200);
    }

    public function active(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'cpf' => 'required|min:11|max:11',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $employee = Employee::find($request->cpf);

        if (empty($employee)) { return response()->json(['message' => 'employee not found'],404); }

        $employee->active = true;
        
        $employee->save();

        return response()->json(['message' => 'employee actived'],200);
    }

    public function inactive(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'cpf' => 'required|min:11|max:11',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $employee = Employee::find($request->cpf);

        if (empty($employee)) { return response()->json(['message' => 'employee not found'],404); }

        $employee->active = false;
        
        $employee->save();

        return response()->json(['message' => 'employee inactived'],200);
    }

    public function read(Request $request)
    {
        $name = $request->query("name");

        if (!empty($name)) {
            $employee = Employee::where('name','like','%' . $name . '%')->get();
            if (is_null($employee) || $employee->count() == 0) { return response()->json(['message' => 'employee not found'],404); }
            return response()->json($employee,200);
        }

        $employee = Employee::all();

        return response()->json($employee,200);
    }

    public function readByCpf(String $cpf)
    {
        if (empty($cpf)) { return response()->json(['message' => 'cpf empty'],400); }

        $employee = Employee::find($cpf);

        if (empty($employee)) { return response()->json(['message' => 'employee not found'],404); }

        return response()->json($employee,200);
    }
}
