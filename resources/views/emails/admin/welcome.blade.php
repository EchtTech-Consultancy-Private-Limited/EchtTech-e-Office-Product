<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ECHT TECH Consultancy</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #555555;
        }

        .footer {
            margin-top: 20px;
            color: #777777;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to ECHT TECH Consultancy!</h1>
    <p>Dear {{$mailData['company_name'] ?? ''}},</p>
    <p>A hearty welcome from all of us at ECHT TECH Consultancy! We're thrilled to have you on board as our esteemed client, embarking on a transformative journey with our HRMS solutions.</p>

    <p><strong>Elevate Your HR Experience</strong></p>
    <p>Get ready to experience a seamless and efficient HRMS journey tailored just for you. At ECHT TECH Consultancy, we're dedicated to simplifying complexities and providing solutions that empower your team for success.</p>

    <p><strong>Your Success, Our Priority</strong></p>
    <p>As you dive into this partnership, know that your success is our priority. We're not just here to deliver a product; we're committed to building a lasting relationship, growing hand-in-hand with your evolving needs.</p>

    <p><strong>Anytime, Anywhere Support</strong></p>
    <p>Have questions, feedback, or need assistance? Our team at ECHT TECH Consultancy is here for you. Count on us for responsive and personalized support to ensure a smooth and positive experience throughout.</p>

    <p>Once again, welcome to ECHT TECH Consultancy. We're excited about the incredible journey ahead and eager to contribute to your HRMS success.</p>

    <p>Best Regards,<br>
        ECHT TECH Consultancy Team</p>

    <div class="footer">
        <p>© 2024 ECHT TECH Consultancy. All rights reserved.</p>
    </div>
</div>
</body>
</html>
