<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Message Log</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Internal CSS styles -->
    <style>
        nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px; 
            height: 100%;
            background-color: #f8f9fa; 
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
    <!-- Navigation menu -->
    <nav>
        <ul>
            <!-- Navigation links -->
            <li><a href="/Main/index">Landing Page</a></li>
            <li><a href="/Main/about_us">About Us</a></li>
            <li><a href="/Message/contact">Contact Us</a></li>
            <li><a href="/Message/read">See the messages we get</a></li>
        </ul>
    </nav>

    <!-- Main content -->
    <div class="container">
        <h1>Message Listing</h1>
        <p>This page displays a listing of all messages.</p>
        
        <!-- Check if there are messages to display -->
        <?php var_dump($data) ?>
        <?php if (empty($data)): ?>
            <!-- If no messages found, display an alert -->
            <div class="alert alert-info" role="alert">
                No messages found.
            </div>
        <?php else: ?>
            <!-- If messages found, display them in a table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through each message and display in table rows -->
                    <?php foreach ($data as $index => $message): ?>
                        <tr>
                            <td><?= $message->email ?></td>
                            <td><?= $message->message ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Back to Home link -->
    <p><a href="/Main/index" class="btn btn-secondary">Back to Home</a></p>

    <!-- Display counter here -->
        <div id="counter" style="position: fixed; bottom: 10px; right: 10px;"></div>
    </div>
    <!-- JavaScript code -->
    <script>
        $(document).ready(function () {

            // AJAX request to fetch the counter
            $.ajax({
                url: 'index.php?controller=Count&action=index',
                method: 'POST',
                success: function (response) {

                    // Display the counter at the bottom right corner of the page
                    $('#counter').text('Page Access Count: ' + response.count);
                },
                error: function () {
                    
                    // Handle error if counter fetch fails
                    console.log('Failed to fetch counter');
                }
            });
        });
    </script>
</body>

</html>
