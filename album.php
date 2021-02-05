<?php


 require_once('connection.php');

 $albumId = $_GET['id'];

if (!is_numeric($albumId)) {
    header('Location: index.php');
}

 $query = $connection->query("
   SELECT albums.id, albums.title, artists.description, albums.cover, artists.name AS artist
   FROM albums
     JOIN artists ON albums.id_artist = artists.id
   WHERE albums.id = {$albumId}
 ");

 $album = $query->fetch_assoc();
// if (!$album) {
//     header('Location: index.php');

?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Album title</title>
  <meta charset="utf-8">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/script.js"></script>
</head>
<body class="wFull">
  <div id="cover-bg">
    <img id="cover" src="img/covers/<?php echo $album['cover']; ?>" alt="">
    <h2 class="artist-name"><?php echo $album['artist']; ?></h2>
    <img class="arrow" src="img/angle-down-solid.png" alt="">
  </div>
  <div class="w600">
  <h1><?php echo $album['title']; ?></h1>
  <p><?php echo $album['description']; ?></p>
  </div>
</body>
</html>
