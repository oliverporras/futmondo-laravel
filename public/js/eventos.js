var url = 'http://futmondo.sticker4life.com.devel';

window.addEventListener("load", function(){
  
  $('.like').css('cursor', 'pointer');
  $('.dislike').css('cursor', 'pointer');

  function dislike(){
    $('.like').unbind('click').click(function(){
      $(this).addClass('far dislike').removeClass('fas like');

      $.ajax({
        url: url+'/dislike/'+$(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado dislike");
          }
          else{
            console.log("Error al dar dislike");
          }
        }
      });

      like();
    })
  }
  dislike();

  function like(){
    $('.dislike').unbind('click').click(function(){
      $(this).addClass('fas like').removeClass('far dislike');

      $.ajax({
        url: url+'/like/'+$(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado like");
          }
          else{
            console.log("Error al dar like");
          }
        }
      });

      dislike();
    })
  }
  like();


});