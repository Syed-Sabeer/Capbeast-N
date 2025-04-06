<!DOCTYPE html>
<html>
<head>
    <title>New Reseller Registered</title>
</head>
<body>
    <h2>New Reseller Registered</h2>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>NEQ Number:</strong> {{ $user->neq_number }}</p>
    <p><strong>Country:</strong> {{ $user->country }}</p>
    <p>Please review their account and approve it if everything is correct.</p>
</body>
</html>
