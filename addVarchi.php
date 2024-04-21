<?php
session_start();
require_once("conn.php");

if (isset($_POST['scelta'])) {
    $option = $_POST['scelta'];

    $query = "SELECT LONG_X_4326 as lng, LAT_Y_4326 as lat, stateVar, nameVar FROM varchiAreaB WHERE stateVar = '$option'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $markers = array();
        while ($row = $result->fetch_assoc()) {
            $markers[] = array(
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'name' => $row['nameVar']
            );
        }

        // Store markers data in session
        $_SESSION['markers'] = $markers;

        // Redirect to the index page
        header("Location: index.php");
        exit;
    } else {
        echo "0 risultati per '$option'";
    }
} else {
    echo "Seleziona un'opzione!";
}
?>
