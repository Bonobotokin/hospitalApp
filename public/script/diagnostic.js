(function($) {
    'use strict';
    $(function() {
      var diagnosticItem = $('.diagnostic');
      var diagnosticInput = $('.diagnosticInput');
      $('.diagnostic-list-add-btn').on("click", function(event) {
        event.preventDefault();
  
        var item = $(this).prevAll('.diagnosticInput').val();
  
        if (item) {
          diagnosticItem.append("<li><div class='form-check'><input type='text'  name='symptomes[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
          diagnosticInput.val("");
        }
  
      });
  
      diagnosticItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }
  
        $(this).closest("li").toggleClass('completed');
  
      });
  
      diagnosticItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });
  
    });
  })(jQuery);