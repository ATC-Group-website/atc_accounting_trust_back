<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Candidate Application</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #1a202c;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
        }

        .info-group {
            margin-bottom: 20px;
            border-bottom: 1px solid #edf2f7;
            padding-bottom: 15px;
        }

        .info-group:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #4a5568;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 5px;
            display: block;
        }

        .value {
            font-size: 16px;
            color: #2d3748;
        }

        .message-box {
            background-color: #f8fafc;
            border-left: 4px solid #1a202c;
            padding: 15px;
            margin-top: 10px;
            font-style: italic;
        }

        .footer {
            background-color: #f8fafc;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #718096;
        }

        .cv-badge {
            display: inline-block;
            background-color: #38a169;
            color: white;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Application Received</h1>
        </div>
        <div class="content">
            <div class="info-group">
                <span class="label">Candidate Name</span>
                <span class="value">{{ $apply->name }}</span>
            </div>

            <div class="info-group">
                <span class="label">Email Address</span>
                <span class="value">{{ $apply->email }}</span>
            </div>

            <div class="info-group">
                <span class="label">Message</span>
                <div class="message-box">
                    {{ $apply->message ?? 'No message provided.' }}
                </div>
            </div>

            @if($apply->cv)
                <div class="info-group">
                    <span class="label">Attachments</span>
                    <span class="cv-badge">CV Attached</span>
                </div>
            @endif
        </div>
        <div class="footer">
            <p>This is an automated notification from the Accounting Trust Application Portal.</p>
            <p>&copy; {{ date('Y') }} Accounting Trust. All rights reserved.</p>
        </div>
    </div>
</body>

</html>