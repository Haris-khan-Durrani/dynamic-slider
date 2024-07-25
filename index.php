<?php
include 'admin/db.php';
$qu="select * from allslides";
$result = $conn->query($qu);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Slick Adaptive Height (Normal Operation - 1 Slide)</title>
  <link rel='stylesheet' href='//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
<link rel='stylesheet' href='//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css'><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script><script>
// window.onload=function(){
// $(".slickNormalAdaptive").slick({
//   fade: true,
//   pauseOnHover:false,
//   autoplaySpeed: 3000,
//   centerMode: true,
//   autoplay: true,
  
// });
// };

   window.onload = function() {
      var slideCount = $(".slickNormalAdaptive").children().length;
      
      $(".slickNormalAdaptive").slick({
        fade: true,
        pauseOnHover: false,
        autoplaySpeed: 3000,
        centerMode: true,
        autoplay: true
      }).on('afterChange', function(event, slick, currentSlide) {
        if (currentSlide === slideCount - 1) {
          setTimeout(function() {
            location.reload();
          }, 3000); // Adjust the delay as needed
        }
      });
    };
</script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="slickNormalAdaptive">
<?php while ($row = $result->fetch_assoc()): ?>
  <div class="box100 green"><img src="<?php echo $row['sidurl']; ?>" style="height:100vh;width:100vw"></div>
  <?php endwhile; ?>
</div>
<!-- partial -->


</body>
</html>
