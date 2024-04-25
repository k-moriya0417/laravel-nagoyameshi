$(function () {
  let Like = $('.like-toggle');
  let likeRestaurantId;
  Like.on('click',function () {
    let $this = $(this);
    likeRestaurantId = $this.data('restaurant-id');

    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/nagoyameshi/public/like',
      method: 'POST',
      data: {
        'restaurant_id': likeRestaurantId
      },
    })
    .done(function (data) {
      $this.toggleClass('liked');
      if ($this.hasClass('liked')) {
        $this.text('お気に入り');
      } else {
        $this.text('お気に入り解除');
      }
      $this.next('.like-counter').html(data.restaurant_likes_count);
    })
    .fail(function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    });
  });
});
