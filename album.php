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
  <script type="text/javascript">
var snowmax=35;
var snowcolor=new Array("#AAAACC","#DDDDFF","#CCCCDD","#F3F3F3","#F0FFFF","#FFFFFF","#EFF5FF")
var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS");
var snowletter="*" ;
var sinkspeed=0.6; 
var snowmaxsize=40;
var snowminsize=8;
var snowingzone=1;
  
  
var snow=new Array();
var marginbottom;
var marginright;
var timer;
var i_snow=0;
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent;
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/);
var ns6=document.getElementById&&!document.all;
var opera=browserinfos.match(/Opera/);
var browserok=ie5||ns6||opera;
function randommaker(range) {
    rand=Math.floor(range*Math.random());
    return rand;
}
function initsnow() {
    if (ie5 || opera) {
        marginbottom=document.body.clientHeight;
        marginright=document.body.clientWidth;
    }
    else if (ns6) {
        marginbottom=window.innerHeight;
        marginright=window.innerWidth;
    }
    var snowsizerange=snowmaxsize-snowminsize;
    for (i=0;i<=snowmax;i++) {
        crds[i]=0;
        lftrght[i]=Math.random()*15;
        x_mv[i]=0.03+Math.random()/10;
        snow[i]=document.getElementById("s"+i);
        snow[i].style.fontFamily=snowtype[randommaker(snowtype/length)];
        snow[i].size=randommaker(snowsizerange)+snowminsize;
        snow[i].style.fontSize=snow[i].size+"px";
        snow[i].style.color=snowcolor[randommaker(snowcolor.length)];
        snow[i].sink=sinkspeed*snow[i].size/5;
        if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
        if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
        if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
        if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
        snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size);
        snow[i].style.left=snow[i].posx+"px";
        snow[i].style.top=snow[i].posy+"px";
    }
    movesnow();
}
function movesnow() {
    for(i=0;i<=snowmax;i++) {
        crds[i]+=x_mv[i];
        snow[i].posy+=snow[i].sink;
        snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+"px";
        snow[i].style.top=snow[i].posy+"px";
        if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])) {
            if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
            if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
            if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
            if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
            snow[i].posy=0;
        }
    }
    var timer=setTimeout("movesnow()",50);
}
for (i=0;i<=snowmax;i++) {
    document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"px;'>"+snowletter+"</span>");
}
if (browserok) {
    window.onload=initsnow;
}
</script>
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
