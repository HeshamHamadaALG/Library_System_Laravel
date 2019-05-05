


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
        const bookId = $('#bookId').val();
        const port = (window.location.hostname=='localhost')?':8000':'';
        const  urlPath =  'http://' + window.location.hostname + port + '/api/set_comment_rating';
        const currRating = $(this).data('rating');
        $star_rating[ind].next('input.rating-value').val(currRating);
        const comment_id = $(this).siblings('input.comment_id').val();
        // console.log(comment_id)
        // console.log(currRating);
        // console.log(bookId);
        // console.log(ind)

        const request = $.ajax( {
            method: 'POST',
            url: urlPath,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              bookId,
              comment_id,
              currRating,
            }
        } );
  
        request.done( function ( response ) {
          console.log( response );
        });
        // fetch(urlPath, {
        //     method: 'post',
        //     headers:{
        //       'content-type':'application/json'
        //     },
        //     body: {
        //         bookId,
        //         comment_id,
        //         currRating,
        //       }
        //   })
        return SetRatingStar(ind);
      });
    }

    for(var i=0;i<$star_rating_len;i++){
        addAction(i);
        SetRatingStar(i);
    }
    
});
