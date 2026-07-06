<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Models\Customer;
use App\Models\Proposal;
use App\Models\Invoice;
use App\Models\Transaction;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard',[
            'customerCount' =>Customer::count(),
            'proposalCount' => Proposal::count(),
            'invoiceCount' => Invoice::count(),
            'transactionCount' => Transaction::count(),
        ]);
    })->name('dashboard');

    Route::resource('customers',CustomerController::class);
    Route::resource('proposals',ProposalController::class);
    Route::resource('invoices',InvoiceController::class);
    Route::resource('transactions',TransactionController::class);

    Route::get('/payment/{invoice}',[PaymentController::class,'checkout'])->name('payment.checkout');
    Route::get('/payment/success/{invoice}',[PaymentController::class,'success'])->name('payment.success');
    Route::get('/payment/cancel',[PaymentController::class,'cancel'])->name('payment.cancel');



});
