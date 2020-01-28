<?php
    
?>
<html>
    <head>
    <link  rel="stylesheet" type="text/css" href="style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One|Monoton&display=swap" rel="stylesheet">
    </head>
    <body >
       <div class ="logo"> <img src="logo2.png" height ="95" width="100" align="middle"/>
      <span class ="text">Here Is What Ninja Stored For You</span>
</div><br><br><br><br><br> <br><br> <br><br> 
 
   <div class= "a">
    
  <form name="search" method="POST" action="">
  <input type="text" placeholder="Search....." name="text" >
  <input type="submit" value="Search"  id="sbut" name="go">
 
  <a href="data.json" id="export" download>
      Export 
  </a>
  </form>

  </div>
<br>
    

       <div class= "display">
       <?php
$db='3302577_bookmark';
$server ='fdb18.biz.nf';
$username = '3302577_bookmark';
$password='#golugolu02#';
$conn = new mysqli($server,$username,$password,$db);
$search=$_POST["text"];
//echo $search;
$fh = fopen('data.json', 'w');
//mysql_connect('host', 'username', 'password');
$sql="SELECT * FROM `bookmarks`";
$res=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($res)) {
    $last = end($row);
    foreach ($row as $item) {
        fwrite($fh, $item);
        if ($item != $last)
            fwrite($fh, "\t");
    }
    fwrite($fh, "\n");
}
fclose($fh);


if(isset($_POST['go'])){
	$sql="SELECT * FROM `bookmarks` WHERE url LIKE '%$search%' OR  title LIKE '%$search%' OR note LIKE '%$search%'";       
    $res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
			while($row=mysqli_fetch_assoc($res)){
                echo "<div class ='show'>"."<div class ='title'> "."".$row['title']."</div>"."<div class ='url'>"
        . "<a href= '".$row['url']."'>"."<div class ='visit'>Visit Site</div>"."</a></div>"."<div class ='note'>"."<span id='note_title'>Note</span> <br><br><div class ='note_display'> ".$row['note']."</div></div>"."</div>"."<br><br><br>";

            }
        }}

?>

       </div>


        
    </body>
    </html>