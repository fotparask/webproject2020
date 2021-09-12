<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Traffic</title> 
        <link rel="stylesheet" href="css/style.css">

        <!-- LeafletJS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    </head>

    <body>
        <!-- Upload File -->
        <div>
            <input type="file" onchange="javascript: startAjax();">
            
            <button type="button" id="but">Test Ajax!</button>

            <script defer src="upload-file.js" charset="utf-8"></script>
            <script defer type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script defer type="text/javascript">
                startAjax() {
                    $('#but').click(function() {
                        const temp = 'Hi, I am a temp variable!'
                        $.ajax({
                            url: './includes/upload_file.inc.php',
                            type: 'POST',
                            data: {har_string: temp},
                            success: function (data, status, xhr) {
                                $('p').append('status: ' + status + ', data: ' + data);
                            // function(response){
                                // window.location.href = './includes/upload_file.inc.php'
                            },
                            error: function (jqXhr, textStatus, errorMessage) {
                                $('p').append('Error: ' + errorMessage);
                            }
                        });                        
                    });
                };
            </script>
        </div>
        </div> -->
    </body>
</html>
