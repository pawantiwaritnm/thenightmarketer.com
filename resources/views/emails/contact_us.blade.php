<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Us Submission</title>
</head>
<body>
    <h1>New Contact Us Submission</h1>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Country:</strong> {{ $contact->country }}</p>
    <p><strong>Country Code:</strong> {{ $contact->country_code }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <p><strong>Services:</strong> {{ $contact->service }}</p>
</body>
</html>
