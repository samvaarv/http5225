<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Artwork Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <?php
            include('reusable/nav.php');

            // Define the nl2p function
            function nl2p($text) {
                // Split the text into paragraphs
                $paragraphs = explode("\n\n", $text);
                $html = '';
                foreach ($paragraphs as $para) {
                    // Trim and convert newlines to <br> tags, wrap in <p>
                    if (trim($para)) {
                        $html .= '<p>' . nl2br(htmlspecialchars(trim($para))) . '</p>';
                    }
                }
                return $html;
            }
        ?>
        <main>
            <div class="container">
                <article class="art-article">
                    <?php
                        include 'reusable/conn.php';
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            // Sanitize and validate the 'id' parameter
                            $artwork_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                            if ($artwork_id !== false && $artwork_id > 0) {
                                // Construct and execute the query
                                $query = "SELECT Artworks.*, Artists.Artist AS Artist, Locations.*
                                            FROM Artworks
                                            JOIN Artists ON Artworks.ArtistID = Artists.ArtistID
                                            JOIN Locations ON Artworks.LocationID = Locations.LocationID
                                            WHERE Artworks._id = $artwork_id";
                                $result = mysqli_query($connect, $query);
                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    // Output the details
                                    echo '<div class="art-header">
                                                <span class="text-center">' . htmlspecialchars($row["Artist"]) . '</span>
                                                <h1 class="text-center text-uppercase">' . htmlspecialchars($row["Title"]) . '</h1>
                                            </div>
                                            <div class="art-image-block">
                                                <img src="' . htmlspecialchars($row["ImageURL"]) . '" alt="' . htmlspecialchars($row["YearInstalled"]) . '" class="w-100 h-100">
                                            </div>
                                            <div class="row main-content">
                                                <div class="col-12 col-md-7 col-xl-8 pe-md-5">
                                                <h2 class="sub-heading mb-3">Description</h2>
                                                <div class="text-desc">' . nl2p($row["Description"]) . '</div>
                                                </div>
                                                <aside class="col-12 col-md-5 col-xl-4">
                                                <div class="art-widget">
                                                    <h4 class="art-widget-title">Year Installed</h4>
                                                    <p class="art-widget-text">' . htmlspecialchars($row["YearInstalled"]) . '</p>
                                                </div>
                                                <div class="art-widget">
                                                    <h4 class="art-widget-title">Art Form</h4>
                                                    <p class="art-widget-text">' . htmlspecialchars($row["ArtForm"]) . '</p>
                                                </div>
                                                <div class="art-widget">
                                                    <h4 class="art-widget-title">Medium</h4>
                                                    <p class="art-widget-text">' . htmlspecialchars($row["Medium"]) . '</p>
                                                </div>
                                                <div class="art-widget">
                                                    <h4 class="art-widget-title">Location</h4>
                                                    <p class="art-widget-text">' . htmlspecialchars($row["Ward"]) . ' ' . htmlspecialchars($row["Location"]) . ', ' . htmlspecialchars($row["WardFullName"]) . '</p>
                                                </div>
                                                <div class="art-widget">
                                                    <div class="mt-5">
                                                        <a href="updateart.php?id=' . $artwork_id . '" class="btn btn-warning">
                                                            <svg height="45.6" width="125.738"><rect height="45.6" width="125.738"></rect></svg>
                                                            <span class="btn-text">UpdateArtwork</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="art-widget">
                                                    <div class="mt-5">
                                                        <a href="inc/delete_artwork.php?id=' . $artwork_id . '" class="btn btn-danger">
                                                            <svg height="45.6" width="125.738"><rect height="45.6" width="125.738"></rect></svg>
                                                            <span class="btn-text">Delete Artwork</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                </aside>
                                            </div>';
        
                                } else {
                                    echo '<p>Artwork details not found.</p>';
                                }
                            } else {
                                echo '<p>Invalid artwork ID.</p>';
                            }
                        } else {
                            echo '<p>No artwork selected.</p>';
                        }
                    ?>
                </article>
            </div>
        </main>
        <?php
            include('reusable/scripts.php');
        ?>
        <!-- Modal HTML for success/failure messages -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to show modal if message exists -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_SESSION['message'])): ?>
                const modal = new bootstrap.Modal(document.getElementById('messageModal'));
                if (modal) {
                    modal.show();
                    setTimeout(() => {
                        modal.hide();
                        window.location.href = window.location.href.split('?')[0]; // Redirect to remove status from URL
                    }, 3000); // 3 seconds
                }
                <?php unset($_SESSION['message']); unset($_SESSION['className']); ?>
            <?php endif; ?>
        });
    </script>
    </body>
</html>
