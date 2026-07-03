<!DOCTYPE html>
<html>
<head>
    <title>Proposal Created</title>
</head>
<body>

    <h2>New Proposal Created</h2>

    <p>Hello,</p>

    <p>A new proposal has been created successfully.</p>

    <hr>

    <p><strong>Proposal Number:</strong> {{ $proposal->proposal_number }}</p>

    <p><strong>Title:</strong> {{ $proposal->title }}</p>

    <p><strong>Description:</strong> {{ $proposal->description }}</p>

    <p><strong>Amount:</strong> ${{ $proposal->amount }}</p>

    <p><strong>Status:</strong> {{ $proposal->status }}</p>

    <hr>

    <p>Thank you.</p>

</body>
</html>