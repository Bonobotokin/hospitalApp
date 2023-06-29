(function($) {
    'use strict';
    $(function() {
      var laboItem = $('.labo');
      var laboInput = $('.laboInput');
      $('.labo-list-add-btn').on("click", function(event) {
        event.preventDefault();

        var item = $(this).prevAll('.laboInput').val();
        // var examenLaboratoire = $(this).data('examenLaboratoire');
        var liste = document.querySelector('.labo');
        var lignes = liste.getElementsByTagName('li');
        
        var lignesCount = 0;
        console.log(lignes.length);
        
        if (item) {
          
          if(lignes.length = 0){

            laboItem.append("<li><div class='form-check'><input type='text'  name='0[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
            laboInput.val("");
          }
          
          else if (lignes.length >= 1) {

            for (let i = 0; i < lignes.length; i++) {
              laboItem.append("<li><div class='form-check'><input type='text'  name='"+ lignesCount +"[designation]' class='form-control' value='"+ item +"'/></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
              lignesCount++;
              laboInput.val("");
            }
          }
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
