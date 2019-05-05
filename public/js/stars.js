


// var $star_rating = $('.star1 .fa');
//.star-rating


$(document).ready(function() {

  var $book_rating = $('.book-rating .fa');

  var SetBookRatingStar = function() {
    return $book_rating.each(function() {
      if (parseInt($book_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
        return $(this).removeClass('fa-star-o').addClass('fa-star');
      } else {
        return $(this).removeClass('fa-star').addClass('fa-star-o');
      }
    });
  };

  $book_rating.on('click', function() {
    // $book_rating.siblings('input.rating-value').val($(this).data('rating'));
    const bookId = $('#bookId').val();
    const port = (window.location.hostname=='localhost')?':8000':'';
    const  urlPath =  'http://' + window.location.hostname + port + '/api/set_book_rating';
    const currRating = $(this).data('rating');
    $book_rating.siblings('input.rating-value').val(currRating);
    // console.log("hello",bookId,"---",currRating);
    const request = $.ajax( {
        method: 'POST',
        url: urlPath,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          bookId,
          currRating,
        }
    } );
    request.done( function ( response ) {
      console.log( response );
    });
    
    console.log("BOOOK_RATING",$(this).data('rating'))
    return SetBookRatingStar();
  });

  SetBookRatingStar();



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
        
        return SetRatingStar(ind);
      });
    }
    for(var i=0;i<$star_rating_len;i++){
        addAction(i);
        SetRatingStar(i);
    }
    
});
