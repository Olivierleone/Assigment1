<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $name ?>
    </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
            /* Adjust the width as needed */
            height: 100%;
            background-color: #f8f9fa;
            /* Change the background color if needed */
            padding: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="/Main/index">Landing Page</a></li>
            <li><a href="/Main/about_us">About Us</a></li>
            <li><a href="/Message/contact">Contact Us</a></li>
            <li><a href="/Message/viewmessage">See the messages we get</a></li>

        </ul>
    </nav>
    <div id='container'>
        <h1>Contact Us</h1>
        <p>This is the contact us form page of our website.</p>
       <form method='post' action='/Message/viewmessage'>
            <!-- utility class used for adding margin-bottom to an element. third scallingis present -->
          <div class="form-group">
                <label>Email address:<input type="email" class="form-control" name="email" placeholder="jondoe@email.com" /></label>
            </div>
            <div class="form-group">
                <label>message:<input type="text" class="form-control" name="message" placeholder="Doe" /></label>
            </div>

            <div class="form-group">
          <input type="submit" name="action" value="Register" />

        </div>
        </form>

    </div>

</body>

</html>