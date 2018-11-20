<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<h1>hello world</h1>
</head>
<body>
    <?php
        $url_to_image = 'https://www.gstatic.com/webp/gallery3/1.png';
        $my_save_dir = '';
        $filename = basename($url_to_image);
        $complete_save_loc = $my_save_dir . $filename;
        file_put_contents($complete_save_loc, file_get_contents($url_to_image));
    ?>  
</body>
</html>
