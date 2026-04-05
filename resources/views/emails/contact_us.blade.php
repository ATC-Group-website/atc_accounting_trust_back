<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Inquiry Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 600px;
            margin: 24px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            background-color: #0d9488;
            color: #ffffff;
            padding: 24px;
            text-align: center;
        }

        .content {
            padding: 24px;
        }

        .content h2 {
            margin-top: 0;
            font-size: 18px;
            color: #0f172a;
        }

        .details {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
        }

        .details th,
        .details td {
            text-align: left;
            padding: 12px;
            border: 1px solid #e5e7eb;
        }

        .details th {
            background-color: #f1f5f9;
            width: 40%;
        }

        .footer {
            padding: 16px 24px 24px;
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>New Contact Inquiry</h1>
        <p>{{ $data['reason_for_contact'] ?? 'General Inquiry' }}</p>
    </div>
    <div class="content">
        <h2>Contact Details</h2>
        <table class="details">
            <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $data['name'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $data['email'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $data['phone'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $data['country'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Company</th>
                <td>{{ $data['company_name'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Reason</th>
                <td>{{ $data['reason_for_contact'] ?? 'N/A' }}</td>
            </tr>
            </tbody>
        </table>

        <h2>Inquiry</h2>
        <p>{{ $data['inquiry'] ?? 'N/A' }}</p>
    </div>
    <div class="footer">
        <p>This message was generated automatically from the contact form on atcaccountingtrust.com.</p>
    </div>
</div>
</body>
</html>

