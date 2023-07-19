<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

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
        // Validate the request data to ensure it meets your requirements
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'car_plate' => 'required|string|max:20',
            'service' => 'required'
        ]);

        // // Process the form data as per your requirements.
        // // For example, you might want to save it to a database.

        // // For now, let's just log the data and send a response back to the client.
        $data = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'car_plate' => $validatedData['car_plate'],
            'service' => $validatedData['service'],
        ];


        $user = $this->userService->create($data);
        return response()->json($data, 200);
        // // You can perform any other actions you need here, such as saving the data to a database.

        // // Send a response back to the client (you can customize this based on your needs)
        // return response()->json(['message' => 'Data received successfully']);
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
