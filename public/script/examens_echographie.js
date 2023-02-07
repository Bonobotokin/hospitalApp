(function($) {
    'use strict';
    $(function() {
      var echographieItem = $('.echographie');
      var echographieInput = $('.echographieInput');
      $('.echographie-list-add-btn').on("click", function(event) {
        event.preventDefault();

        var item = $(this).prevAll('.echographieInput').val();

        if (item) {
          echographieItem.append("<li><div class='form-check'><input type='text'  name='examens[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
          echographieInput.val("");
        }

      });

      echographieItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }

        $(this).closest("li").toggleClass('completed');

      });

      echographieItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });

    });
  })(jQuery);
