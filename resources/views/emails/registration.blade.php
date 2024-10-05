<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-size: cover;
            background-color: #ffe7ba;
            color: #950000;
            margin: 0;
            padding: 20px;
        }
        .container {
            position: relative;
            max-width: 600px;
            margin: auto;
            background-image: url('https://img.freepik.com/free-photo/top-view-truck-boxes_23-2149853130.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1727827200&semt=ais_hybrid');
            background-size: cover;
            background-position: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            color: white; /* Text color for better contrast */
        }
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 234, 218, 0.75); /* Semi-transparent blue overlay */
            border-radius: 10px;
            z-index: 1; /* Position it below the text */
        }
        .container > * {
            position: relative; /* Position text above the overlay */
            z-index: 2;
        }

        h1 {
            color: #ff9542;
            text-align: center;
            font-size: 2.5em;
        }
        p {
            font-size: 1.1em;
            color: rgb(238, 109, 16);
            font-weight: 500;
            font-family: Calibri;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #555;
        }
        .cta {
            display: inline-block;
            text-align: center;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #f5aa6f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
        }
        .cta:hover {
            background-color: #fac69c;
            transform: scale(1.05);
        }
        .highlight {
            color: #ff7000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome, <span class="highlight">{{ $ownerName }}</span>!</h1>
    <p>We’re ensuring the safest delivery of your products.</p>
    <p>Thank you for signing up for our service. We're <span class="highlight">excited</span> to have you on board!</p>
    <p>Your account has been <span class="highlight">successfully created</span>.</p>
    <br>
    <br>
    <br>
    <a href="#" class="cta">Get Started</a>
    <br>
    <br>
    <br>
    <div class="footer">
        <span><b>Best regards</b>,<br><b style="font-size: 19px">SOC Courier Server</b></span>
    </div>
</div>
</body>
</html>
