<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>New arrival</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en-us" />




</script>
<style type="text/css">
        body,table { margin:0; padding:0;}
        table.featured-item a { color:#2d4466;padding:1.5px;}
        table.featured-item .title,table.featured-item .author { display:block; }
        table.featured-item .title { margin-bottom:0.4em; }
        table.featured-item td { width:10%;text-align:center;font-family:Arial,Geneva,sans-serif;font-weight:bold;font-size:77%;}


</style>
</head>
<body>
<div id="top">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	$opac_url="http://demoopac.firstray.in";
	$host = 'localhost';  
         $user = 'kohaadmin';  
         $pass = 'katikoan';  
         $dbname = 'demostaff';  
         $conn = mysqli_connect($host, $user, $pass,$dbname);
	

if(!$conn){  
            die('Could not connect: '.mysqli_connect_error());  
         }  
         $sql = "SELECT biblio.biblionumber,biblio.title,biblio.author,biblioitems.isbn FROM items LEFT JOIN biblioitems on (items.biblioitemnumber=biblioitems.biblioitemnumber) LEFT JOIN biblio on (biblioitems.biblionumber=biblio.biblionumber) order by rand() limit 3";  

   $newtitles_result = mysqli_query($conn, $sql); 
// Make a MySQL Connection

?>
<table class="featured-item" align="center" border="0"><tr>
 <?php while($row = mysqli_fetch_array($newtitles_result )){ ?>
<td>

<a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-detail.pl?biblionumber=<?php echo $row['biblionumber']; ?>"><img src="http://images.amazon.com/images/P/<?php echo $row['isbn']; ?>.01._THUMBZZZ_PB_PU_PU0_.jpg" alt="" border="0"/></a>


<?php if($row['title']){ ?>
<a class="title" target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=ti:<?php echo $row['title']; ?>"><?php echo  substr($row['title'],0,20); ?></a>
<?php } ?>
<span class="author">
<?php if($row['author']){ ?>
By <a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=au:<?php echo $row['author']; ?>"><?php echo substr($row['author'],0,20); ?></a>.
<?php } ?>
</span>
</td>
<?php } ?>
</tr>
</table>
</div>


<br/>
<div id="bottom">

<?php
// Make a MySQL Connection

$newtitles_sql = "SELECT biblio.biblionumber,biblio.title,biblio.author,biblioitems.isbn FROM items LEFT JOIN biblioitems on (items.biblioitemnumber=biblioitems.biblioitemnumber) LEFT JOIN biblio on (biblioitems.biblionumber=biblio.biblionumber) order by rand() limit 3";
//where items.location = 'DISPLAY' order by rand() limit 3";



 $newtitles_result = mysqli_query($conn,$newtitles_sql);



?>
<table class="featured-item" align="center" border="0"><tr>
 <?php while($row = mysqli_fetch_array($newtitles_result )){ ?>
<td>

<a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-detail.pl?biblionumber=<?php echo $row['biblionumber']; ?>"><img src="http://images.amazon.com/images/P/<?php echo $row['isbn']; ?>.01._THUMBZZZ_PB_PU_PU0_.jpg" alt="" border="0"/></a>


<?php if($row['title']){ ?>
<a class="title" target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=ti:<?php echo $row['title']; ?>"><?php echo substr($row['title'],0,20); ?></a>
<?php } ?>
<span class="author">
<?php if($row['author']){ ?>
By <a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=au:<?php echo $row['author']; ?>"><?php echo substr($row['author'],0,20); ?></a>.
<?php } ?>
</span>
</td>
<?php } ?>
</tr>
</table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
//alert("hii");
              setTimeout(checkImages,600);
        });
        function checkImages(){
        $(".featured-item img").each(function(){
                        // console.log(this.src);
            w = this.width;
            h = this.height;
            if ((w == 1) || (h == 1)) {
                this.src ="http://library.flame.edu.in/opac-tmpl-old/ccsr/images/images.jpg";
/*            } else if ((this.complete != null) && (!this.complete)) {
                this.src = 'http://www.myacpl.org/files/Image/book-cover-missing2.gif';*/
            }
        });
        }
</script>

</body>
</html>
