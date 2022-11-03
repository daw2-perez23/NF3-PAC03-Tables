<?php
$db = mysqli_connect('localhost', 'root', 'root') or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
//get our starting point for the query from the URL
if (isset($_GET['offset'])) {
$offset = $_GET['offset'];
} else {
$offset = 0;
}
//get the movie
$query = 'SELECT
movie_name, movie_year
FROM
movie
ORDER BY
movie_name
LIMIT ' . $offset . ', 1';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title> <?php echo $row['movie_name']; ?> </title>
</head>
<body>
<table border=”1”>
<tr>
<th> Movie Name </th>
<th> Year </th>
</tr> <tr>
<td><?php echo $row['movie_name'];?></td>
<td> <?php echo $row['movie_year'];?> </td>
</tr>
</table>
<p>
<a href="page.php?offset=0"> Page 1 </a> ,
<a href="page.php?offset=1" > Page 2 </a> ,
<a href="page.php?offset=2" > Page 3 </a>
</p>
</body>
</html>