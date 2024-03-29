<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

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

        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .team-member img {
            width: 300px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px;
        }

        .team-member .caption {
            font-size: 16px;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="/Main/index">Landing Page</a></li>
            <li><a href="/Main/about_us">About Us</a></li>
            <li><a href="/Message/contact">Contact Us</a></li>
            <li><a href="/Message/read">See the messages we get</a></li>
        </ul>
    </nav>

    <!-- Main content -->
    <div class="container">
        <h1>About Us</h1>
        <p>See our incredible team of developers</p>

        <!-- Team member cards -->
        <div class="team-member">
            <img src="/../../images/agressif.jpg" alt="Team Member 1">
            <div class="caption">Amer Al Jawabra<br>Calm and collected</div>
        </div>

        <div class="team-member">
            <img src="/../../images/thinker.jpg" alt="Team Member 2">
            <div class="caption">Olivier Leone<br>Critical Thinker</div>
        </div>

        <div class="team-member">
            <img src="/../../images/leader.jpg" alt="Team Member 3">
            <div class="caption">Alexander Cécile<br>The Leader</div>
        </div>

        <div class="team-member">
            <img src="/../../images/helper.jpg" alt="Team Member 4">
            <div class="caption">Saâd Salmane<br>The Helper</div>
        </div>
        
        <!-- Display counter here -->
        <div id="counter" style="position: fixed; bottom: 10px; right: 10px;"></div>
    </div>
    </div>

    <!-- JavaScript code -->
    <script>
        $(document).ready(function() {

            // AJAX request to fetch the page access count
            $.ajax({
                url: 'index.php?controller=Count&action=index',
                method: 'POST',
                success: function (response) {
                    // Display the page access count at the bottom right corner of the page
                    $('#counter').text('Page Access Count: ' + response.count);
                },
                error: function () {

                    // Handle error if page access count fetch fails
                    console.log('Failed to fetch page access count');
                }
            });
        });
    </script>
</body>
</html>
