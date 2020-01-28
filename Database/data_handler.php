<?php
$url = $_POST['link'];
$title=$_POST['title'];
$note =$_POST['note'];
$db='bookmarkext';
$server ='localhost';
$username = 'root';
$password='';
$conn = new mysqli($server,$username,$password,$db);
$sql="INSERT INTO bookmarks (url, title,note ) VALUES  ('$url','$title','$note')";
if($conn->query($sql)===TRUE){
    echo "done ";
}
$server ='localhost';
$db="internal_ass_boomark";
$username='roo_folder_123_for_unique_id';


?>
