 //Funskino per login loading (data-text Duke u kyqur)
 $(document).ready(function login_loading() {
     $('#login_submit').click(function () {
         if (($('#username').val().length !== 0) && ($('#password').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

 //Funskino per register (data-text Duke u Regjistriar)
 
 $(document).ready(function () {
     $('#register_submit').click(function () {
         if (($('#emri').val().length !== 0) && ($('#mbiemri').val().length !== 0) && ($('#username').val().length !== 0) && ($('#password').val().length !== 0) && ($('#email').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

