
<div class="bottomBar">
    <div class="container">
        <p>&copy Rocket&co 2017 - All rights reserved </p>
        <ul class="socialIcons">
<?php
function chrono()
{
$temps = explode(' ', microtime());
return $temps[0]+$temps[1];
}
$debut = chrono();
?>
           | Player(s) online : <strong><font color="black"><?php echo $joueurs; ?></font></strong> | Accounts : <strong><font color="black"><?php echo $accounts; ?></font></strong> | Page generated in <?php echo round(chrono()-$debut,6); ?>
        </ul>
    </div>
</div>

<!-- JavaScript file links -->
<script src="../../assets/001/js/jquery.js"></script>			<!-- Jquery -->
<script src="../../assets/001/js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="../../assets/001/js/respond.js"></script>
<script src="../../assets/001/js/jquery.bxslider.min.js"></script>           <!-- bxslider -->
<script src="../../assets/001/js/tabs.js"></script>       <!-- tabs -->
<script src="../../assets/001/js/jquery.nouislider.min.js"></script>  <!-- price slider -->
<script>
//call bxslider for sub header section
$(document).ready(function(){
    $('.bxslider').bxSlider({
        auto: true,
        pager: false,
        nextSelector: '.slider-next',
        prevSelector: '.slider-prev',
        nextText: '<img src="images/slider-next.png" alt="slider next" />',
        prevText: '<img src="images/slider-prev.png" alt="slider prev" />'
    });
});
</script>

<script>
//Setup price slider 
var Link = $.noUiSlider.Link;

$(".priceSlider").noUiSlider({
     range: {
      'min': 0,
      'max': 800000
    }
    ,start: [150000, 550000]
    ,step: 1000
    ,margin: 100000
    ,connect: true
    ,direction: 'ltr'
    ,orientation: 'horizontal'
    ,behaviour: 'tap-drag'
    ,serialization: {
        lower: [
            new Link({
                target: $("#price-min")
            })
        ],

        upper: [
            new Link({
                target: $("#price-max")
            })
        ],

        format: {
        // Set formatting
            decimals: 0,
            thousand: ',',
            prefix: '$'
        }
    }
});
</script>

</body>
</html>
