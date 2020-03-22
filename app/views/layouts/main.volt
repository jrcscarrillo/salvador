<!DOCTYPE html>
<html>
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Twitter -->
        <meta name="twitter:site" content="@themepixels">
        <meta name="twitter:creator" content="@themepixels">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="DashForge">
        <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
        <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

        <!-- Facebook -->
        <meta property="og:url" content="http://themepixels.me/dashforge">
        <meta property="og:title" content="DashForge">
        <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

        <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
        <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
        <meta name="author" content="ThemePixels">

        <!-- Poner titulo -->
        {{ get_title() }}
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://carrillosteam.com/public/dashforge/assets/img/favicon.png">

        <!-- vendor css -->
        <link href="https://carrillosteam.com/public/dashforge/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://carrillosteam.com/public/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

        <!-- DashForge CSS -->
        <link rel="stylesheet" href="https://carrillosteam.com/public/dashforge/assets/css/dashforge.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/dashforge/assets/css/dashforge.landing.css">

        <!-- Formas solidas -->
        <link rel="stylesheet" href="https://carrillosteam.com/public/dashforge/formas/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://carrillosteam.com/public/coop/style/sky-forms-blue.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/coop/style/sky-forms.css">
        <link rel="stylesheet" type="text/css" href="https://carrillosteam.com/public/coop/style/style.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/coop/style/table.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/dashforge/formas/demo.css">
        <style type="text/css">
            #map_canvas {
                height: 600px;
                width: 100%;
            }
            #floating-panel {
                position: absolute;
                top: 10px;
                left: 25%;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
                text-align: center;
                font-family: 'Roboto', 'sans-serif';
                line-height: 30px;
                padding-left: 10px;
                width: 450px;
            }
        </style>
    </head>
    <body>
        {% block cuerpo %}{% endblock %}
        {#        <script src="https://carrillosteam.com/public/dashforge/lib/jquery/jquery.min.js"></script>#}
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script src="https://carrillosteam.com/public/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://carrillosteam.com/public/dashforge/lib/feather-icons/feather.min.js"></script>
{#        <script src="https://carrillosteam.com/public/dashforge/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>#}
        
        <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.common.min.js"></script>
        
{#        <script src="https://carrillosteam.com/public/dashforge/lib/jquery.flot/jquery.flot.js"></script>#}
{#        <script src="https://carrillosteam.com/public/dashforge/lib/jquery.flot/jquery.flot.stack.js"></script>#}
{#        <script src="https://carrillosteam.com/public/dashforge/lib/jquery.flot/jquery.flot.resize.js"></script>#}
{#        <script src="https://carrillosteam.com/public/dashforge/lib/chart.js/Chart.bundle.min.js"></script>#}
{#        <script src="https://carrillosteam.com/public/dashforge/lib/jqvmap/jquery.vmap.min.js"></script>#}
{#        <script src="https://carrillosteam.com/public/dashforge/lib/jqvmap/maps/jquery.vmap.usa.js"></script>#}

        <script src="https://carrillosteam.com/public/dashforge/assets/js/dashforge.js"></script>
        <script src="https://carrillosteam.com/public/dashforge/assets/js/dashforge.aside.js"></script>
{#        <script src="https://carrillosteam.com/public/dashforge/assets/js/dashforge.sampledata.js"></script>#}
        <script src="https://carrillosteam.com/public/dashforge/assets/js/dashboard-one.js"></script>

        <!-- append theme customizer -->
        <script src="https://carrillosteam.com/public/dashforge/lib/js-cookie/js.cookie.js"></script>

        <!-- para las formas solidas -->
        {#        <script src="https://carrillosteam.com/public/js/formas/vendor/jquery-ui.min.js" type="text/javascript"></script>                        <!-- jquery ui plugin -->#}
        <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
            integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
        crossorigin="anonymous"></script>
        <script src="https://carrillosteam.com/public/js/formas/ion.rangeSlider.js" type="text/javascript"></script>                      <!-- ion slider library -->
{#        <script src="https://carrillosteam.com/public/js/formas/vendor/jquery.steps.min.js" type="text/javascript"></script> #}
        <script src="https://carrillosteam.com/public/js/formas/jquery.steps.js" type="text/javascript"></script> 
        {#        <script src="https://carrillosteam.com/public/js/formas/vendor/jquery.validate.min.js" type="text/javascript"></script>                  <!-- jquery validator -->#}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
{#        <script src="https://carrillosteam.com/public/js/formas/vendor/jquery.additional-methods.min.js" type="text/javascript"></script>        <!-- jquery additional-methods -->#}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
{#        <script src="https://carrillosteam.com/public/js/formas/vendor/jquery.maskedinput.min.js" type="text/javascript"></script>               <!-- jquery masked input -->#}
        <script src="https://carrillosteam.com/public/js/formas/jquery.mask.js" type="text/javascript"></script>               <!-- jquery masked input -->
        <script src="https://carrillosteam.com/public/js/formas/solid-form.js" type="text/javascript"></script>                                        <!-- jquery custom codes -->
        <script async defer src="https://maps.google.com/maps/api/js?key=AIzaSyCd2XZMfVIGD9CBuu91r9bpvv8L9xAM9T0&callback=initMap"></script>

    </body>
</html>
