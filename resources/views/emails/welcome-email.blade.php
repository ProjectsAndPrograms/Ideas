

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Ideas Platform</title>
    <style>
        /* Add your CSS styles here for email formatting */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            
            
        }
        
        h1 {
            color: #e95420;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #772953;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #a51b65;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Ideas!</h1>
      

        <p>Dear {{ auth()->user()->name }},</p>
        <p>Congratulations on joining Ideas, the platform where creativity knows no bounds! We're thrilled to have you as a part of our community. Your journey to exploring, sharing, and collaborating on innovative ideas starts now.</p>
        <p>To get started, feel free to log in with the credentials you provided during registration. Dive into a world of endless possibilities, interact with fellow users, and make your mark on Ideas.</p>
        <p>We're here to support you every step of the way. If you have any questions or need assistance, don't hesitate to reach out to our dedicated support team.</p>
        <p>Thank you for choosing Ideas. Let the creativity flow!</p>
        <p>Best regards,</p>
        <p>The Ideas Team</p>
        <p style="text-align: center;"><a href="{{ route('login') }}" class="button text-light" style="color: white !important;">Log In to Ideas</a></p>
    </div>
</body>
</html>
