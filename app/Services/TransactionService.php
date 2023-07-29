<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction(array $transactionData)
    {
        // Add any business logic here before creating the transaction.
        // For example, you can validate data or perform additional operations.

        // Call the TransactionRepository to create the transaction.
        return $this->transactionRepository->create($transactionData);
    }

    public function updateTransaction(array $transactionData, $transactionId)
    {
        // Add any business logic here before updating the transaction.
        // For example, you can validate data or perform additional operations.

        // Call the TransactionRepository to update the transaction.
        return $this->transactionRepository->update($transactionData, $transactionId);
    }

    public function deleteTransaction($transactionId)
    {
        // Add any business logic here before deleting the transaction.
        // For example, you can check if the transaction is in a valid state for deletion.

        // Call the TransactionRepository to delete the transaction.
        return $this->transactionRepository->delete($transactionId);
    }

    public function getTransactionById($transactionId)
    {
        // Call the TransactionRepository to find a transaction by its ID.
        $result=$this->transactionRepository->findById($transactionId);
        return response()->json($result,200) ;
    }

    // Add other methods as needed to handle different business logic related to transactions.
}
