<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function checkout(Invoice $invoice){
        
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],

            'line_items' => [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => 'Invoice ' . $invoice->invoice_number,
                ],
                'unit_amount' => $invoice->amount * 100,
            ],
            'quantity' => 1,
        ]],

        'mode' => 'payment',

        'success_url' => route('payment.success',[
            'invoice' => $invoice->id,
        ]) .'?session_id={CHECKOUT_SESSION_ID}',

        'cancel_url' => route('payment.cancel'),
    ]);

    return Inertia::location($session->url);
    }

    public function success(Invoice $invoice){

        $invoice->update([
        'status' => 'Paid',
        ]);

    
        Transaction::create([
            'customer_id' => $invoice->customer_id,
            'invoice_number' => $invoice->invoice_number,
            'transaction_number' => 'TX' . str_pad(Transaction::count() + 1, 3, '0', STR_PAD_LEFT),
            'amount' => $invoice->amount,
            'payment_date' => now(),
            'payment_method' => 'Stripe',
            'status' => 'Completed',
        ]);
    
        return redirect()->route('transactions.index');
        
    }

    public function cancel(){
        
        return "Payment Cancelled!";
        
    }
}
