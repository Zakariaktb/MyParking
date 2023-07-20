<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return 'hello';
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Define the validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'car_plate' => 'required|string|max:20',
            'service' => 'required'
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Return a JSON response with the validation errors and a 422 status code (Unprocessable Entity)
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // If the validation passes, proceed to process the form data
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'car_plate' => $request->input('car_plate'),
            'service' => $request->input('service'),
        ];
        // dd($data);
        $result=$this->userService->create($data);
        return response()->json($result,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
