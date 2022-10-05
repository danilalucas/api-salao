<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
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
            'name'  => 'required',
            'email' => 'required',
            'cpf'   => 'required|min:11|max:11'
        ]);
        
        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $client = Client::create($request->all());

        return response()->json($client,201);
    }

    public function update(Request $request, int $id)
    {
        $validated =  Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email',
            'cpf'   => 'required|min:11|max:11',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $client = Client::find($id);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->cpf = $request->cpf;
        if ($request->has('cellphone')){ 
            $client->cellphone = $request->cellphone;
        }
        
        $client->save();

        return response()->json($client,200);
    }

    public function active(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $client = Client::find($request->id);

        if (empty($client)) { return response()->json(['message' => 'client not found'],404); }

        $client->active = true;
        
        $client->save();

        return response()->json(['message' => 'client actived'],200);
    }

    public function inactive(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $client = Client::find($request->id);

        if (empty($client)) { return response()->json(['message' => 'client not found'],404); }

        $client->active = false;
        
        $client->save();

        return response()->json(['message' => 'client inactived'],200);
    }

    public function read(Request $request)
    {
        $name = $request->query("name");

        if (!empty($name)) {
            $client = Client::where('name','like','%' . $name . '%')->get();
            if (is_null($client) || $client->count() == 0) { return response()->json(['message' => 'client not found'],404); }
            return response()->json($client,200);
        }

        $client = Client::all();
        
        return response()->json($client,200);
    }

    public function readById(int $id)
    {
        if (empty($id)) { return response()->json(['message' => 'id empty'],400); }

        $client = Client::find($id);

        if (empty($client)) { return response()->json(['message' => 'client not found'],404); }

        return response()->json($client,200);
    }
}
