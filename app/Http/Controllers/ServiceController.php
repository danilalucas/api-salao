<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
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
            'name' => 'required',
        ]);
        
        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $service = Service::create($request->all());

        return response()->json($service,201);
    }

    public function update(Request $request, int $id)
    {
        $validated =  Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $service = Service::find($id);

        $service->name = $request->name;
        
        $service->save();

        return response()->json($service,200);
    }

    public function active(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $service = Service::find($request->id);

        if (empty($service)) { return response()->json(['message' => 'service not found'],404); }

        $service->active = true;
        
        $service->save();

        return response()->json(['message' => 'service actived'],200);
    }

    public function inactive(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $service = Service::find($request->id);

        if (empty($service)) { return response()->json(['message' => 'service not found'],404); }

        $service->active = false;
        
        $service->save();

        return response()->json(['message' => 'service inactived'],200);
    }

    public function read(Request $request)
    {
        $name = $request->query("name");

        if (!empty($name)) {

            $service = Service::where('name','like','%' . $name . '%')->get();
            return response()->json($service,200);
        }

        $service = Service::all();
        
        return response()->json($service,200);
    }

    public function readById(int $id)
    {
        if (empty($id)) { return response()->json(['message' => 'id empty'],400); }

        $service = Service::find($id);

        if (empty($service)) { return response()->json(['message' => 'service not found'],404); }

        return response()->json($service,200);
    }
}
