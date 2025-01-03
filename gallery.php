<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .gallery {
            columns: 3;
            column-gap: 20px;
            padding: 20px;
            width: 100%;
            margin: 0 auto;
        }

        .image-container {
            margin-bottom: 20px;
            display: inline-block;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .image-container:hover {
            transform: scale(1.08);
            box-shadow: 0 50px 50px rgba(206, 204, 207, 0.2);
        }

        .image-container:hover img {
            transform: scale(1.1);
        }

        @media screen and (max-width: 1200px) {
            .gallery {
                columns: 2;
            }
        }

        @media screen and (max-width: 768px) {
            .gallery {
                columns: 1;
            }
        }

        .col1 {
            width: 230px;
            height: 100px;
            background-color: rgb(0, 0, 0);
            color: #e3e1e9;
            font-size: 22px;
            float: left;
            text-align: center;
            line-height: 80px;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <div class="col1"><a href="home.php">Home</a></div>
            <div class="col1"><a href="about.php">About</a></div>
            <div class="col1"><a href="shopping.php">Shopping</a></div>
            <div class="col1"><a href="gallery.php">Gallery</a></div>
            <div class="col1"><a href="contact.php">Contact Us</a></div>
        </div>
    </div>

    <div class="gallery">
        <?php
        $directory ="D:\web\image\jpg"; // Update this to your image folder path
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Supported image formats

        // Check if directory exists
        if (is_dir($directory)) {
            // Scan the directory and fetch image files
            $images = array_diff(scandir($directory), ['.', '..']); // Exclude "." and ".."

            foreach ($images as $image) {
                $fileExtension = pathinfo($image, PATHINFO_EXTENSION);
                // Check if the file is an image
                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    $imagePath = $directory . $image; // Full path to the image
                    echo '<div class="image-container">';
                    echo '<img src="data:image/' . $fileExtension . ';base64,' . base64_encode(file_get_contents($imagePath)) . '" alt="' . htmlspecialchars($image) . '">';
                    echo '</div>';
                }
            }
        } else {
            echo "<p>Image directory not found.</p>";
        }
        ?>
    </div>

    <div>
        <div>
            <div class="col1"><a href="home.php">Home</a></div>
            <div class="col1"><a href="about.php">About</a></div>
            <div class="col1"><a href="shopping.php">Shopping</a></div>
            <div class="col1"><a href="gallery.php">Gallery</a></div>
            <div class="col1"><a href="contact.php">Contact Us</a></div>
        </div>
    </div>
</body>
</html>
