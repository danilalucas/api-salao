<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
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
            'datetime'      => 'required',
            'employee_cpf'  => 'required|exists:employees,cpf',
            'client_id'     => 'required|exists:clients,id',
            'service_id'    => 'required|exists:services,id',
        ]);
        
        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $scheduled = Schedule::where('datetime',$request->datetime)
                             ->where('employee_cpf',$request->employee_cpf)
                             ->first();
        
        if (!empty($scheduled)) { return response()->json(['message' => 'schedule not available'],409); }

        $schedule = Schedule::create($request->all());

        return response()->json($schedule,201);
    }

    public function update(Request $request, int $id)
    {
        $validated =  Validator::make($request->all(), [
            'datetime'      => 'required',
            'employee_cpf'  => 'required|exists:employees,cpf',
            'client_id'     => 'required|exists:clients,id',
            'service_id'    => 'required|exists:services,id',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $schedule = Schedule::find($id);

        $schedule->datetime = $request->datetime;
        $schedule->employee_cpf = $request->employee_cpf;
        $schedule->client_id = $request->client_id;
        $schedule->service_id = $request->service_id;
        
        $schedule->save();

        return response()->json($schedule,200);
    }

    public function read(Request $request)
    {
        $schedule = Schedule::all();
        
        return response()->json($schedule,200);
    }

    public function readById(int $id)
    {
        if (empty($id)) { return response()->json(['message' => 'id empty'],400); }

        $schedule = Schedule::find($id);

        if (empty($schedule)) { return response()->json(['message' => 'schedule not found'],404); }

        return response()->json($schedule,200);
    }

    public function delete(int $id)
    {
        if (empty($id)) { return response()->json(['message' => 'id empty'],400); }

        $schedule = Schedule::find($id);

        if (empty($schedule)) { return response()->json(['message' => 'schedule not found'],404); }

        $deletedSchedule = $schedule->delete();

        if ($deletedSchedule) { return response()->json(['message' => 'schedule deleted'], 200); }

        return response()->json(['message' => 'error on delete schedule'], 500);
    }
}
