<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;
use App\Http\Resources\SocietiesResource;
use Illuminate\Support\Facades\Validator;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $society = Society::paginate(10);
        // $society = Society::all();
        if ($society) {
            return response()->json([
                'code' => '200',
                'status' => 'OK',
                'data' => new SocietiesResource($society),
            ], 200);
        } else {
            return response()->json([
                'code' => '404',
                'status' => 'NOT_FOUND'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'gender' => 'required',
            'pob' => 'required',
            'photo' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'profession' => 'required',
            'nationality' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => '400',
                'status' => 'BAD_REQUEST',
                'errors' => $validator->messages(),
            ], 400);
        }

        $society = Society::create([
            'nik'   => fake()->unique()->nik,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'pob' => $request->pob,
            'photo' => $request->photo,
            'dob' => $request->dob,
            'address' => $request->address,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'profession' => $request->profession,
            'nationality' => $request->nationality
        ]);

        return response()->json([
            'code' => '201',
            'status' => 'CREATED',
            'data' => new SocietiesResource($society)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $society = Society::find($id);
        if ($society) {
            return response()->json([
                'code' => '200',
                'status' => 'OK',
                'data' => new SocietiesResource($society)
            ], 200);
        } else {
            return response()->json([
                'code' => '404',
                'status' => 'NOT_FOUND'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $society = Society::find($id);
        if (!$society) {
            return response()->json([
                'code' => '404',
                'status' => 'NOT_FOUND'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'gender' => 'required',
            'pob' => 'required',
            'photo' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'profession' => 'required',
            'nationality' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => '400',
                'status' => 'BAD_REQUEST',
                'errors' => $validator->messages(),
            ], 400);
        } else {
            $society->update([
                'fullname' => $request->fullname,
                'gender' => $request->gender,
                'pob' => $request->pob,
                'photo' => $request->photo,
                'dob' => $request->dob,
                'address' => $request->address,
                'religion' => $request->religion,
                'marital_status' => $request->marital_status,
                'profession' => $request->profession,
                'nationality' => $request->nationality
            ]);

            return response()->json([
                'code' => '200',
                'status' => 'OK',
                'data' => new SocietiesResource($society)
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::find($id);
        if (!$society) {
            return response()->json([
                'code' => '404',
                'status' => 'NOT_FOUND'
            ], 404);
        } else {
            $society->destroy($id);
            return response()->json([], 204);
        }
    }
}
