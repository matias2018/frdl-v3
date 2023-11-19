jQuery(document).ready(function($) {

  /* take care of number of posts to display */

  /* 
  1- get the total of posts
  2- divide the total number of posts by the number of posts inside each 'cluster' (set of 8 posts)
  3- display the first set
  4- evaluate how many images we still have to display
  5- if (there are more images to show) -> display 'show more button'
   5.1- when the 'show more' button is pressed, display any number of images up until 8
   5.2- go to 4
  6- if (!there are more images to show) -> hide 'show more button'
  

    let totalObras = $('.obra.displayOnHold').length;
    let how_many_obras_to_be_shown = 8;
    let how_many_obras_left_to_be_shown = totalObras - how_many_obras_to_be_shown;

  function initShow() {


    if(totalObras > how_many_obras_to_be_shown) {
      $('.show-more').removeClass('buttonOff');
      $( '.obra' ).slice(how_many_obras_to_be_shown).addClass('hidden');
    }
    console.log('totalObras', totalObras);
    console.log('how_many_obras_to_be_shown', how_many_obras_to_be_shown);
    console.log('totalObras - how_many_obras_to_be_shown', (totalObras - how_many_obras_to_be_shown));
  }

  initShow();

  $( ".show-more" ).click(function(e) {
    e.preventDefault();
    var showMore = $(this); 
    
    if(how_many_obras_left_to_be_shown >= 1) {
      for(i = 0; i < how_many_obras_to_be_shown; i++) {
        $('.displayOnHold').removeClass('hidden displayOnHold');
        how_many_obras_left_to_be_shown -=1;
      }
      
      if(how_many_obras_left_to_be_shown < 1) {
        $('.show-more').addClass('buttonOff');
        how_many_obras_left_to_be_shown = 0;
      }
    }
    
  });
  */

  /* applying filters */
  
  var maxFilter = 0;
  
  $( ".filter-btn" ).click(function(e) {

    e.preventDefault();

    var thisBtn = $(this);


    
   switch ( $( ".filter-btn" ).index( this ) ) {
     
      case 0 :
        if(!thisBtn.hasClass('filter-active')){
          maxFilter += 1;
          thisBtn.addClass('filter-active');
          thisBtn.addClass('workTypeBtn');
          $('.obra[data-category="Obras e Equipamentos Sociais"]').addClass('hidden');
          checkWorkTypes()
        } else if(thisBtn.hasClass('filter-active') && $('.filter-active').length > 1){
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          thisBtn.removeClass('workTypeBtn');
          $('.obra[data-category="Recuperação de Património"]').addClass('hidden');
          $('.obra[data-category="Obras e Equipamentos Sociais"]').removeClass('hidden');
        } else if(thisBtn.hasClass('filter-active') && $('.filter-active').length === 1){
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          thisBtn.removeClass('workTypeBtn');
          $('.hidden').removeClass('hidden');
        }
        /* value = "Recuperação de Património"; */
        break;
      case 1 :
        if(!thisBtn.hasClass('filter-active')){
          maxFilter += 1;
          thisBtn.addClass('filter-active');
          thisBtn.addClass('workTypeBtn');
          $('.obra[data-category="Recuperação de Património"]').toggleClass('hidden');
          checkWorkTypes()
        } else if(thisBtn.hasClass('filter-active') && $('.filter-active').length > 1){
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          thisBtn.removeClass('workTypeBtn');
          $('.obra[data-category="Recuperação de Património"]').removeClass('hidden');
          $('.obra[data-category="Obras e Equipamentos Sociais"]').addClass('hidden');
        } else if(thisBtn.hasClass('filter-active') && $('.filter-active').length === 1){
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          thisBtn.removeClass('workTypeBtn');
          $('.hidden').removeClass('hidden');
        }
        /* value = "Obras e Equipamentos Sociais"; */
        break;
      case 2 :
        if(!thisBtn.hasClass('filter-active')) {
          maxFilter += 1;
          thisBtn.addClass('filter-active');
          $('.done_').toggleClass('hideDone');
          checkFilters();
        } else {
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          $('.done_1').toggleClass('hideDone');
          checkFilters();
        }
        break;
      case 3 :
        if(!thisBtn.hasClass('filter-active')) {
          maxFilter += 1;
          thisBtn.toggleClass('filter-active');
          $('.done_1').toggleClass('hideDone');
          checkFilters();
        } else {
          maxFilter -= 1;
          thisBtn.removeClass('filter-active');
          $('.done_').toggleClass('hideDone');
          checkFilters();
        }
        break;
    }
   
    if( (thisBtn.hasClass('filter-active') && maxFilter > 3) ) {
      location.reload();
    }
    /* $( "span" ).text( "" + value );  */
  });

  function checkWorkTypes() {
    var filters = $('.workTypeBtn');
    var hidden = $('.hidden');
    console.log(filters);
    if(filters.length >= 2 || filters.length < 1) {
      hidden.removeClass('hidden')
    }
  }

  function checkFilters() {
    var filters = $('.filter-active[data-filter="Concluded"]');
    var hidden = $('.hideDone');
    if(filters.length >= 2 || filters.length < 1) {
      hidden.removeClass('hideDone');
    };
  }

})
