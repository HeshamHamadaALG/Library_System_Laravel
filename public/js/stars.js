


// var $star_rating = $('.star1 .fa');
//.star-rating


$(document).ready(function() {
    var $star_rating_len = $('.star-rating').length;
    var $star_rating_block = $('.star-rating');
    console.log("hello",$star_rating_block.get()[0]);
    var $star_rating = Array();

    for(var i=0;i<$star_rating_len;i++){
        $star_rating[i] = $('.star'+i+' .fa');
    }
    
    
    var SetRatingStar = function(i) {
        return $star_rating[i].each(function() {
          if (parseInt($star_rating[i].next('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
          } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
          }
        });
      };
    
      

    function addAction(ind){
      $star_rating[ind].on('click', function() {
        console.log($star_rating[ind]);
        console.log(ind);
        $star_rating[ind].next('input.rating-value').val($(this).data('rating'));
        return SetRatingStar(ind);
      });
    }

    for(var i=0;i<$star_rating_len;i++){
        addAction(i);
        SetRatingStar(i);
    }
    
});
