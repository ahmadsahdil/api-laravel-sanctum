<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Student; 

class FormController extends Controller
{
    public function index()
    {
        $student = Student::orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List Student order by created',
            'data' => $student
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $student = Student::create($request->all());
            $response = [
                'message' => 'Student Created',
                'data' => $student
            ];
    
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }

    public function edit($id)
    {
        try {
            $student = Student::findOrFail($id);
            $response = [
                'message' => 'Student Detail',
                'data' => $student
            ];
    
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $student->update($request->all());
            $response = [
                'message' => 'Student Updated',
                'data' => $student
            ];
    
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        try {
            $student->delete();
            $response = [
                'message' => 'Student Deleted'
            ];
    
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }
}
