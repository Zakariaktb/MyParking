<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class StripeWebhookController extends Controller
{
    /**
     * Handle customer subscription updated.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        $customer = $payload['data']['object']['customer'];

        // handle the incoming event...

        return new Response('Webhook Handled', 200);
    }
    public function handleWebhook(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

// You can find your endpoint's secret in your webhook settings
$endpoint_secret = 'whsec_c4e8bba56095c3caaa444738b14def1821cc7709117cd372c25045b7d643ca71';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  exit();
}

// Handle the checkout.session.completed event
if ($event->type == 'checkout.session.completed') {
  // Retrieve the session. If you require line items in the response, you may include them by expanding line_items.
  $session = \Stripe\Checkout\Session::retrieve([
    'id' => $event->data->object->id,
    'expand' => ['line_items'],
  ]);
  $transaction = Transaction::query()->where('payment_session_id', $session->id)->first();
  $transaction->payment_status = 'paid';
  $transaction->save();

}

http_response_code(200);

    }
}

