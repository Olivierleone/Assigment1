<!DOCTYPE html>
<html>

<head>
    <title>Page Load Counter</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Page Load Counter</h1>
        <p>Loading count: <span id="loadCount"></span></p>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- JavaScript code to fetch and display the loading count -->
    <script>
        $(document).ready(function () {

            // When the document is ready, send an AJAX request to the server to fetch the loading count
            $.getJSON('/Count/index', function (data) {
                
                // Update the content of the 'loadCount' span element with the fetched count
                $('#loadCount').text(data.count);
            });
        });
    </script>
</body>

</html>
