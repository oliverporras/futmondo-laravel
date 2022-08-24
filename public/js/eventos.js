window.addEventListener("load", function(){
  
  $('.like').css('cursor', 'pointer');
  $('.dislike').css('cursor', 'pointer');

  function dislike(){
    $('.like').unbind('click').click(function(){
      $(this).addClass('far dislike').removeClass('fas like');
      var noticia_id = $(this).data('id');
      var nlikes = parseInt($('#likes_'+noticia_id).html());
      console.log("Por el momento hay "+nlikes)

      $.ajax({
        url:   'dislike/'+$(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado dislike");
            nlikes = nlikes - 1;
            $('#likes_'+noticia_id).html( nlikes );
            console.log("Ahora hay "+nlikes);
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
      var noticia_id = $(this).data('id');
      var nlikes = parseInt($('#likes_'+noticia_id).html());
      //console.log("Por el momento hay "+nlikes)

      $.ajax({
        url:   'like/'+$(this).data('id'),
        type: 'GET',
        success: function(response){
          if(response.like){
            console.log("Has dado like");
            nlikes = nlikes + 1;
            $('#likes_'+noticia_id).html( nlikes );
            console.log("Ahora hay "+nlikes);
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

  function logged(){
    $('.logged').click(function(){
      alert("Debes estar identificado para dar like");
    });
  }
  logged();

});