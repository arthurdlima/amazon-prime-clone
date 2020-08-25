<?php
/*carousel section */
function carouselIndicators($dataSlide) {

    if($dataSlide == 0) {
        $indicators = "<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
    } else {
        $indicators = "<li data-target='#carouselExampleIndicators' data-slide-to='$dataSlide'></li>";
    }

    return $indicators;
}

function carouselItemss($itemPos, $banner_url) {

    if($itemPos == 0) {
        $carouselItem = "<div class='carousel-item active'>
                            <img src=$banner_url class='d-block w-100' alt='...'>
                        </div>";
    } else {
        $carouselItem = "<div class='carousel-item'>
                            <img src=$banner_url class='d-block w-100' alt='...'>
                        </div>";
    }


    return $carouselItem;
}





 ?>
