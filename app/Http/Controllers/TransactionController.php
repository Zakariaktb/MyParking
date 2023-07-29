<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $TransactionService;
    public function __construct(TransactionService $TransactionService)
    {
        $this->TransactionService=$TransactionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = session('userId');
        // $user = User::find($userId);
        // $transaction = Transaction::find($userId);

        // // Include the related service name in the response
        // $serviceName = null;
        // if ($transaction && $transaction->service) {
        //     $serviceName = $transaction->service->name; // Assuming 'name' is the column with the service name in the 'services' table
        // }

        // // Prepare the data to be sent in the response
        // $responseData = [
        //     'user' => $user,
        //     'transaction' => $transaction,
        // ];
        $responseData=$this->TransactionService->getTransactionById($userId);
        return response()->json($responseData, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
        $userId = session('userId');
        $transaction=Transaction::find($userId);
        return response()->json($transaction,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
