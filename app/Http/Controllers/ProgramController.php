<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Resources\ProgramResource;
use Illuminate\Support\Str;


class ProgramController extends Controller
{

    public function __controller()
    {
        $this->middleware('auth:api');
    }

   public function index()
   {
       $data = ProgramResource::collection(Program::get());

       return response()->json($data,200);
   }

   public function store(Request $request)
   {
        $data = [
            'name_program'=>$request->input('name'),
            'description'=>$request->input('description'),
            'active'=>!is_null($request->input('active')) ? true : false,
            'program_uid'=>(string)Str::uuid()
        ];

        $programCreated = Program::create($data);

        $dataCreated = new ProgramResource($programCreated);

        return response()->json($dataCreated,201);
   }


   public function update(Request $request,$id)
   {
       $data = [
           'name_program'=>$request->input('name'),
           'description'=>$request->input('description'),
           'active'=>!is_null($request->input('active')) ? true : false,
       ];

       Program::findOrFail($id)->update($data);

       return response()->json(200);
   }


    public function destroy($id)
    {
        $deleted = Program::findOrFail($id)->delete();

        return response()->json(['deleted'=>$deleted],200);
    }
}
