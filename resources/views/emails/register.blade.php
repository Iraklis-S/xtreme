<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Trade Profit Notification</title>
    <style>
        /* Inline CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #ff6600;
            /* Orange background color for the header */
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
        }

        #logo {
            width: 100px;
            /* Adjust the width as needed */
            height: auto;
            display: block;
            margin: 0 auto;
        }

        h1 {
            color: #000;
            /* Black text color for the heading */
            margin-top: 20px;
        }

        p {
            color: #333;
            /* Dark gray text color for paragraphs */
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        #footer {
            background-color: #ff6600;
            /* Orange background color for the footer */
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="header">
        xTREME TRADERS
    </div>
    
    <p>Hello {{ $user->name }},</p>
    
    <p>Welcome and enjoy using our trading platform!</p>
    <div id="footer">
        &copy; {{ date('Y') }} xTreme Traders
    </div>
</body>

</html>
