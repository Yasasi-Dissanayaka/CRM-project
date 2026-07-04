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

    <p><strong>Status:</strong> {{ $invoice->status }}</p>

    <hr>

    <p>Thank you for choosing our services.</p>

</body>
</html>