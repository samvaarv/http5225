<?php
    include('reusable/conn.php');

    // Fetch current data for the artwork, artist, and location
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $artwork_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($artwork_id !== false && $artwork_id > 0) {
            $query = "SELECT Artworks.*, Artists.Name AS Artist, Locations.*
                    FROM Artworks
                    JOIN Artists ON Artworks.ArtistID = Artists.ArtistID
                    JOIN Locations ON Artworks.LocationID = Locations.LocationID
                    WHERE Artworks._id = ?";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("i", $artwork_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        } else {
            $_SESSION['message'] = "Invalid artwork ID.";
            $_SESSION['className'] = "alert-danger";
            header("Location: view_artwork.php?status=error");
            exit();
        }
    } else {
        $_SESSION['message'] = "No artwork ID provided.";
        $_SESSION['className'] = "alert-danger";
        header("Location: view_artwork.php?status=error");
        exit();
    }
?>