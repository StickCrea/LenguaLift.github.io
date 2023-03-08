$(document).ready(function() {
    // mostrar submenú al hacer clic en elemento con clase dropdown
    $('.dropdown').click(function() {
      $(this).find('.submenu').slideToggle('fast');
    });
    // ocultar submenú al hacer clic fuera del menú
    $(document).click(function(event) {
      var target = $(event.target);
      if (!target.closest('.dropdown').length) {
        $('.submenu').slideUp('fast');
      }
    });
  });
  