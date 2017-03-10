<?php
$hostname="localhost";
$database="HW4";
$username="root";
$password="root";


$con = mysql_connect($hostname, $username, $password);
$db_selected = mysql_select_db($database, $con);
$queryBooks="SELECT * from book";

$qb=mysql_query($queryBooks);

if(mysql_num_rows($qb)>0){
	
echo "<table cellpadding=10 border=1>";
echo "<tr><th>Title</th></tr>";
// echo "<tr><td>title</td></tr>"
while ($line = mysql_fetch_array($qb)) { 
      $title = $line['title'];
		echo "<tr><td>".$title."</td></tr>";
 }
 
 
 echo "</table>";
 }
 
  
  $req = $_SERVER['REQUEST_METHOD'];
  
        $url_elements = explode('/', $_SERVER['PATH_INFO']);
		
		$id = 0;
		$count=0;
		foreach ($url_elements as $i){
			$id += $i;
			$count++;
		}
           
			if($count==2){
(int) $id;
$sql=" SELECT book.book_id, book.title, book.year, book.price, book.category, authors.author_name from book, book_authors, authors where book.book_id = book_authors.book_id and book_authors.author_id = authors.author_id and book.book_id = '$id'";

$result= mysql_query($sql);

 if(mysql_num_rows($result)>0){
	
  
 echo "<table cellpadding=10 border=1>";
 echo "<tr><th>book_id</th><th>title</th><th>year</th><th>price</th><th>category</th><th>author_name</th></tr>";
 while ($row = mysql_fetch_array($result)) { 
 
 $bookid   = $row['book_id'];
 $title = $row['title'];
 $year = $row['year'];
 $price = $row['price'];
 $category = $row['category'];
 $author_name = $row['author_name'];
 echo "<tr><td>".$bookid."</td><td>".$title."</td><td>".$year."</td><td>".$price."</td><td>".$category."</td><td>".$author_name."</td></tr>";
 }
 echo "</table>";
 }
			}
			

 mysql_close($con);


?>