<?php

require_once('connection.php');

$query = $connection->query('
  SELECT albums.id, albums.title, albums.rating, albums.cover, artists.name 
  FROM albums
    JOIN artists ON albums.id_artist = artists.id
');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Music</title>
  <meta charset="utf-8">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="w90">
  <header></header>

  <h1>Музыка</h1>

  <div>
    <input id="find-field" type="text" placeholder="Поиск">
  </div>

  <div id="albums" class="albums">
    <?php while($album = $query->fetch_assoc())
    { ?>
      <div class="album">
        <div class="album-image">
          <a href="album.php?id=<?php echo $album['id']; ?>">
            <img src="img/covers/<?php echo $album['cover']; ?>" alt="">
          </a>
        </div>
        <div class="rating r-<?php echo $album['rating']; ?>"></div>
        <h3>
          <a href="album.php?id=<?php echo $album['id']; ?>"><?php echo $album['title']; ?></a>
        </h3>
        <h4>
          <a href="album.php?id=<?php echo $album['id']; ?>"><?php echo $album['name']; ?></a>
        </h4>
      </div>
    <?php } ?>
  </div>
</body>
</html>