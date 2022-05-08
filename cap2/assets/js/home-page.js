$(Document).ready(function(){
    // console.log('hi there');
    $("#address_search").change(function(){
        var address_txt = $("#address_search").val();
        $.post('ajax.php',{data_a:address_txt},function(data_a){
            $('#search_result').html(data_a);
        })
    });
    $("#search_job").keyup(function(){
                var txt = $("#search_job").val();
                $.post('ajax.php',{data:txt},function(data){
                    $('#search_result').html(data);
                })
    });
    

    $('.slider_home_page').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });
    
});


(function() {
  // Mobile Navbar
  $(document).ready(function() {
    $('.sidenav').sidenav();
  });

  // Form Validation
  window.addEventListener(
    'load',
    function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener(
          'submit',
          function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    },
    false
  );
})();