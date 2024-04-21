<?php
require_once("conn.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Random Point</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <style>
        html,
        body,
        #map {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script>
        var mapOptions = {
            center: [45.4580, 9.1574],
            zoom: 10
        }

        var map = new L.map('map', mapOptions);

        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        map.addLayer(layer);

        <?php

        $query = "SELECT LONG_X_4326 as lng, LAT_Y_4326 as lat, nameVar FROM varchiAreaB";

        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "L.marker([" . $row['lat'] . ", " . $row['lng'] . "], {alt: '" . $row['wpname'] . "'}).addTo(map).bindPopup('" . $row['wpname'] . "');\n";
            }
        } else {
            echo "0 risultati";
        }
        ?>
    </script>
</body>

</html>