<?php

namespace App\Services;

use App\Repositories\StripePaymentRepository;

class StripePaymentService
{

    protected $stripePaymentRepository;

    public function __construct(StripePaymentRepository $stripePaymentRepository)
    {
        $this->stripePaymentRepository=$stripePaymentRepository;
    }

    public function create()
    {
        $url_session=$this->stripePaymentRepository->createSession();
        return $url_session;
    }

}
