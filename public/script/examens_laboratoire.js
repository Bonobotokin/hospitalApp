(function($) {
    'use strict';
    $(function() {
      var laboItem = $('.labo');
      var laboInput = $('.laboInput');
      $('.labo-list-add-btn').on("click", function(event) {
        event.preventDefault();

        var item = $(this).prevAll('.laboInput').val();

        if (item) {
          laboItem.append("<li><div class='form-check'><input type='text'  name='examens[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
          laboInput.val("");
        }

      });

      laboItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }

        $(this).closest("li").toggleClass('completed');

      });

      laboItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });

    });
  })(jQuery);
