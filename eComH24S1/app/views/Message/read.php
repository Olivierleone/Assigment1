<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Log</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <nav>
        <ul>
            <li><a href="/Main/index">Landing Page</a></li>
            <li><a href="/Main/about_us">About Us</a></li>
            <li><a href="/Message/contact">Contact Us</a></li>
            <li><a href="/Message/read">See the messages we get</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Message Listing</h1>
        <p>This page displays a listing of all messages.</p>
        <?php if (empty($data)): ?>
            <div class="alert alert-info" role="alert">
                No messages found.
            </div>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $message): ?>
                        <tr>
                            <td>
                                <?= $message->email ?>
                            </td>
                            <td>
                                <?= $message->message ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <p><a href="/Main/index" class="btn btn-secondary">Back to Home</a></p>
    </div>
    <!-- Bootstrap JS (optional) -->
</body>

</html>