<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px; /* Adjust the width as needed */
            height: 100%;
            background-color: #f8f9fa; /* Change the background color if needed */
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
            <li><a href="/Contact/index">Contact Us</a></li>
            <li><a href="/Contact/read">See the messages we get</a></li>
            
        </ul>
    </nav>
    <div class="container">
        <h1>Contact Us</h1>
        <p>This is the contact us form page of our website.</p>
        <form>
            <!-- utility class used for adding margin-bottom to an element. third scallingis present -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleInputPassword1"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>

</body>
</html>