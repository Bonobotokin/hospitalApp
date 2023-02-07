(function($) {
    'use strict';
    $(function() {
      var prescriItem = $('.prescri');
      var prescriInput = $('.prescriInput');
      $('.prescri-list-add-btn').on("click", function(event) {
        event.preventDefault();
  
        var item = $(this).prevAll('.prescriInput').val();
  
        if (item) {
          prescriItem.append("<li><div class='form-group row'><label class='col-sm-12'>"+ item +"</label><div class='col-sm-3'><input type='text' class='form-control' ></div><div class='col-sm-3'><input type='text' class='form-control' ></div><div class='col-sm-3'><input type='text' class='form-control' ></div><div class='col-sm-3'><input type='text' class='form-control' ></div><i class='remove mdi mdi-close-circle-outline'></i></div></li>");
          prescriInput.val("");
        }
  
      });
  
      prescriItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }
  
        $(this).closest("li").toggleClass('completed');
  
      });
  
      prescriItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });
  
    });
  })(jQuery);