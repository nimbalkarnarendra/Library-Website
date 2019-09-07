<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



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
         $sql = "SELECT biblio.biblionumber,biblio.title,biblio.author,biblioitems.isbn FROM items LEFT JOIN biblioitems on (items.biblioitemnumber=biblioitems.biblioitemnumber) LEFT JOIN biblio on (biblioitems.biblionumber=biblio.biblionumber) order by items.dateaccessioned limit 6";

   $newtitles_result = mysqli_query($conn, $sql);
// Make a MySQL Connection

?>
                                                                                                

<div class="container" style="overflow-y: hidden;margin-top:-13px">
  <div class="row">
    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                

 <?php while($row = mysqli_fetch_array($newtitles_result )){ 

?>
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-detail.pl?biblionumber=<?php echo $row['biblionumber']; ?>"><img class="coverimage1" src="http://images.amazon.com/images/P/<?php echo $row['isbn']; ?>.01._THUMBZZZ_PB_PU_PU0_.jpg" alt="" border="0"/></a></p>
                        <p><a class="title" target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=ti:<?php echo $row['title']; ?>"><?php echo  substr($row['title'],0,14); ?></a></p>
                        <p>By <a target="_blank" href="<?php echo $opac_url; ?>/cgi-bin/koha/opac-search.pl?q=au:<?php echo $row['author']; ?>"><?php echo substr($row['author'],0,12); ?></a>.</p>
                       
                    </div>
                </div>
                <?php } ?>
                
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
  </div>
</div>


<style type="text/css">
  
  .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;padding: 11px;}
        .MultiCarousel .MultiCarousel-inner .item > div {box-shadow: 0 4px 8px 0 rgba(4, 3, 3, 0.2), 0 6px 20px 0 rgba(10, 10, 10, 0.19); text-align: center; padding:10px; margin:10px; background:white; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
</style>
<script type="text/javascript">
  
  $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>

<script type="text/javascript">
        $(document).ready(function(){
//alert("hii");
	$('a').css({'color' : '#666666'});
              setTimeout(checkImages,3000);
        });

//setTimeout(function(){ $('.coverimage1').css('height' : '107px'); },3010);
// $('.coverimage1').css({'height' : '107px'});
        function checkImages(){
        $(".pad15 img").each(function(){
                        // console.log(this.src);
            w = this.width;
            h = this.height;
            if ((w == 1) || (h == 1)) {
                this.src ="http://library.flame.edu.in/opac-tmpl-old/ccsr/images/images.jpg";
/*            } else if ((this.complete != null) && (!this.complete)) {
                this.src = 'http://www.myacpl.org/files/Image/book-cover-missing2.gif';*/
            }
        });

setTimeout(function(){ $('img').css({'height' : '105px'}); },3500);
    
    }
</script>

