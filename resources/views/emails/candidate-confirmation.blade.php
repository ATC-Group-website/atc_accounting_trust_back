<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
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
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: #ffffff;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .content {
            padding: 40px 30px;
        }

        .welcome-text {
            font-size: 18px;
            color: #1a202c;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .main-text {
            color: #4a5568;
            margin-bottom: 30px;
        }

        .status-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .status-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
            display: block;
        }

        .status-value {
            color: #38a169;
            font-weight: 700;
        }

        .footer {
            background-color: #f8fafc;
            padding: 30px;
            text-align: center;
            font-size: 13px;
            color: #718096;
            border-top: 1px solid #edf2f7;
        }

        .social-links {
            margin-top: 15px;
        }

        .social-links a {
            color: #4a5568;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Application Received</h1>
        </div>
        <div class="content">
            <p class="welcome-text">Dear {{ $apply->name }},</p>
            <p class="main-text">
                Thank you for applying to join <strong>Accounting Trust</strong>. We have successfully received your
                application and our HR team has been notified.
            </p>

            <div class="status-card">
                <span class="status-title">Application Status:</span>
                <span class="status-value">Under Review</span>
                <p style="font-size: 14px; color: #718096; margin-top: 10px;">
                    Our team will review your qualifications and contact you if there is a match for our current
                    openings.
                </p>
            </div>

            <p class="main-text">
                In the meantime, feel free to explore more about our culture and mission on our website.
            </p>
        </div>
        <div class="footer">
            <p>Best regards,<br>The Accounting Trust Team</p>
            <!-- <div class="social-links">
                <a href="#">Website</a> | <a href="#">LinkedIn</a> | <a href="#">Contact Us</a>
            </div> -->
            <p style="margin-top: 20px; font-size: 11px;">
                You received this email because you applied for a position at Accounting Trust. If this wasn't you,
                please disregard this message.
            </p>
            <p>&copy; {{ date('Y') }} Accounting Trust. All rights reserved.</p>
        </div>
    </div>
</body>

</html>