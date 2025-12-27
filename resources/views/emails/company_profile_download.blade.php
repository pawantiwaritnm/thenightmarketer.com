<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Company Profile Download</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9fafb; padding:20px;">

    <div style="max-width:600px; margin:auto; background:#ffffff; padding:20px; border-radius:6px;">
        <h2 style="color:#111827;">📄 New Company Profile Download Request</h2>

        <table width="100%" cellpadding="6" cellspacing="0" style="margin-top:15px;">
            <tr>
                <td width="150"><strong>Name:</strong></td>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td>{{ $data['phone'] }}</td>
            </tr>

            @if(!empty($data['company_name']))
            <tr>
                <td><strong>Company:</strong></td>
                <td>{{ $data['company_name'] }}</td>
            </tr>
            @endif
        </table>

        <hr style="margin:20px 0;">

        <p>
            <strong>Source:</strong> Company Profile Download<br>
            <strong>Date:</strong> {{ now()->format('d M Y, h:i A') }}
        </p>

        <p style="font-size:12px; color:#6b7280;">
            This email was generated automatically from your website.
        </p>
    </div>

</body>
</html>
