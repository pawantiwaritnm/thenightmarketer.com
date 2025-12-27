<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Career Application</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; }
        p { font-size: 16px; color: #555; }
        .button {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Career Application Received</h2>
        <p><strong>Name:</strong> {{ $careerDetails['name'] }}</p>
        <p><strong>Email:</strong> {{ $careerDetails['email'] }}</p>
        <p><strong>Phone:</strong> {{ $careerDetails['phone'] }}</p>
        <p><strong>Position Applied For:</strong> {{ $careerDetails['role'] }}</p>
        <p><strong>Cover Letter:</strong> {{ $careerDetails['cover'] ?? 'N/A' }}</p>
        <p><strong>Resume:</strong> <a class="button" href="{{ asset('storage/' . $careerDetails['resume_path']) }}" target="_blank">Download Resume</a></p>

        <!-- <p class="footer">This is an automated email. Please do not reply.</p> -->
    </div>
</body>
</html>
