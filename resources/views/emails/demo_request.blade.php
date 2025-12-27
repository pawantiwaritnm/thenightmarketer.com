<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Demo Request</title>
</head>
<body>
    <h2>New Demo Request</h2>
    <p><strong>Name:</strong> {{ $demoRequest->name }}</p>
    <p><strong>Email:</strong> {{ $demoRequest->email }}</p>
    <p><strong>Phone:</strong> {{ $demoRequest->country_code }} {{ $demoRequest->phone }}</p>
    <p><strong>Company:</strong> {{ $demoRequest->company }}</p>
    <p><strong>Industry:</strong> {{ $demoRequest->industry }}</p>
    <p><strong>Team Size:</strong> {{ $demoRequest->team_size }}</p>
    <p><strong>Country:</strong> {{ $demoRequest->country }}</p>
    <p><strong>IP:</strong> {{ $demoRequest->ip }}</p>
    <p><strong>User Agent:</strong> {{ $demoRequest->user_agent }}</p>
</body>
</html>
