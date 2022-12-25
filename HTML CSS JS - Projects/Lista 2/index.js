var finalValue = 0;
$(document).ready(function () {
    function animate() {
        $('main').addClass('animated bounceInUp');
    }
    animate();
    $('.mb-2').click(function () {

        event.preventDefault();
        var productName = document.querySelector('.product-name-form').value;
        var productPrice = document.querySelector('.product-price-form').value;
        var moneyExpression = /^([0-9]+|[0-9]{1,3}(,[0-9]{3})*)(\.[0-9]{2})/;
        var noNumbersExpression = /^[a-zA-Z]+$/;

        var $toHTML = $(`<div class="product-place animated shake"><button class="btn btn-primary product-place-button check-btn"><i class="fas fa-shopping-basket"></i></button>
        <button class="btn btn-danger product-place-button delete-btn"><i class="far fa-trash-alt"></i></button>
          <h4 class="text-center green">` + productPrice + `</h4><h3 class="text-center">` + productName + `</h4></div>`)
        $('.place-for-product').append($toHTML)

        $('.delete-btn').click(function () {
            var $parentOfBtn = $(this).parent("div")
            $parentOfBtn.addClass('animated zoomOut');
            setTimeout(function () {
                $parentOfBtn.remove()
            }, 150);

        })
        $('.check-btn').click(function () {
            $(this).addClass('btn-success');
            $(this).addClass('animated bounce');
        });

    });


});
// total value