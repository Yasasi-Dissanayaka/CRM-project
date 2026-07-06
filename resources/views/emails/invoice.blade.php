<!DOCTYPE html>
<html>
<head>
    <title>Your invoice is ready</title>
</head>
<body>

    <h2>Your invoice is ready</h2>

    <p>Hello,</p>

    <p>Your invoice is ready for payment.</p>

    <hr>

    <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>

    <p><strong>Proposal Number:</strong> {{ $invoice->proposal_number }}</p>

    <p><strong>Amount:</strong> Rs. {{ $invoice->amount }}</p>

    <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>

    <br>
    <a href="{{ route('payment.checkout',$invoice->id) }}"
        style="
            background:#6366F1;
            color:white;
            padding:12px 25px;
            text-decoration:none;
            border-radius:8px;
            display:inline-block;
            font-weight:bold;"> 
            <b>
                Pay now
            </b>
    </a>
    <br><br>
    <hr>

    <p>Thank you for choosing our services.</p>

</body>
</html>