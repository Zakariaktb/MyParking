<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function createPayment($token)
    {
        // Add any business logic here before creating the payment.
        // For example, you can validate data or perform additional operations.

        // Call the PaymentRepository to create the payment.
        return $this->paymentRepository->create($token);
    }

    public function updatePayment(array $paymentData, $paymentId)
    {
        // Add any business logic here before updating the payment.
        // For example, you can validate data or perform additional operations.

        // Call the PaymentRepository to update the payment.
        return $this->paymentRepository->update($paymentData, $paymentId);
    }

    public function deletePayment($paymentId)
    {
        // Add any business logic here before deleting the payment.
        // For example, you can check if the payment can be deleted based on its status.

        // Call the PaymentRepository to delete the payment.
        return $this->paymentRepository->delete($paymentId);
    }

    public function getPaymentById($paymentId)
    {
        // Call the PaymentRepository to find a payment by its ID.
        return $this->paymentRepository->findById($paymentId);
    }

    // Add other methods as needed to handle different business logic related to payments.
}
