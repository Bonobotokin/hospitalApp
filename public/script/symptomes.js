(function($) {
    'use strict';
    $(function() {
      var symptomesItem = $('.symptomes');
      var symptomesInput = $('.symptomesInput');
      $('.symptomes-list-add-btn').on("click", function(event) {
        event.preventDefault();
  
        var item = $(this).prevAll('.symptomesInput').val();
  
        if (item) {
          symptomesItem.append("<li><div class='form-check'><input type='text'  name='symptomes[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
          symptomesInput.val("");
        }
  
      });
  
      symptomesItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }
  
        $(this).closest("li").toggleClass('completed');
  
      });
  
      symptomesItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });
  
    });
  })(jQuery);