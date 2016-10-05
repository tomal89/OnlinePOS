<?php
if(isset($_POST['update']))
{
echo "Update button clecked ";
}
elseif(isset($_POST['del']))
{
echo "Delete button clecked ";
}
elseif(isset($_POST['ser']))
{
echo "Search button clecked ";
}
?>
<html>
<body>
<form method="post" action="<?php basename($_SERVER['PHP_SELF']); ?>">
<input name="update" type="submit" value="update" />
<input name="del" type="submit" value="del" />
<input name="ser" type="submit" value="ser" />
</form>
</body>
</html>


<html>
<head>
<title>Find my Favorite Movie!</title>
</head>
<body>
<?php
//add this line:
$myfavmovie = urlencode('Life of Brian');
//change this line:
echo '<a href=’moviesite.php?favmovie=$myfavmovie’>';
echo 'Click here to see information about my favorite movie!';
echo '</a>';
?>
</body>
</html>