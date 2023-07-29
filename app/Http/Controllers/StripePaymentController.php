<?php

// namespace App\Http\Controllers;

// use Exception;
// use Illuminate\Http\Request;
// use Stripe\Stripe as Stripe;

// class StripePaymentController extends Controller
// {
//     //
//     public function stripePost(Request $request)
//     {
//         try{
//             $stripe = new \Stripe\StripeClient(
//                 env('STRIPE_SECRET')
//             );
//             $res=$stripe->tokens->create([
//                 'card' => [
//                     'number' => $request->number,
//                     'exp_month' => $request->exp_month,
//                     'exp_year' => $request->exp_year,
//                     'cvc' => $request->cvc,
//                 ],
//             ]);
//             Stripe::setApiKey(env('STRIPE_SECRET'));

//             $response=$stripe->charges->create([
//                 'amount' => $request->amount,
//                 'currency' => 'usd',
//                 'source' => $res->id,
//                 'description' => $request->description,
//             ]);
//             return response()->json([$response->status],201);
//         }
//     catch (\Stripe\Exception\RateLimitException $e) {
//         // Too many requests made to the API too quickly
//         echo "Rate limit error: " . $e->getMessage();
//     } catch (\Stripe\Exception\InvalidRequestException $e) {
//         // Invalid parameters were supplied to Stripe's API
//         echo "Invalid request error: " . $e->getMessage();
//     } catch (\Stripe\Exception\AuthenticationException $e) {
//         // Authentication with Stripe's API failed
//         echo "Authentication error: " . $e->getMessage();
//     } catch (\Stripe\Exception\ApiConnectionException $e) {
//         // Network communication with Stripe failed
//         echo "Network communication error: " . $e->getMessage();
//     } catch (\Stripe\Exception\ApiErrorException $e) {
//         // Generic API error
//         echo "Stripe API error: " . $e->getMessage();
//     } catch (Exception $e) {
//         // Something else happened
//         echo "Error: " . $e->getMessage();
//     }
//     }
// }
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class StripePaymentController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function stripePost(Request $request)
    {
        $token = $request->input('token');
        $result = $this->paymentService->createPayment($token);
        return response()->json($result,200);
    }

}
