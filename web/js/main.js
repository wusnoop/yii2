$('.modal-content').on('click', '.btn-next', function (){
    $.ajax({
        url: '/cart/order',
        type: 'GET',
        success: function (res) {
            $('#order .modal-content').html(res);
            $('#cart').modal('hide');
            $('#order').modal('show');

        },
        error: function () {
            alert("ERROR");
        }
    })

});



function clearCart(event){
    if (confirm("Are you sure ?")) {
        event.preventDefault();
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (res) {
                $('#cart .modal-content').html(res);
                $('.menu-quantity').html('(0)');
            },
            error: function () {
                alert("ERROR");
            }
        })
    }
}

function openCart(event){
    event.preventDefault();
    $.ajax({
        url: '/cart/open',
        type: 'GET',
        success: function (res){
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function (){
            alert("ERROR");
        }
    })
}




$('.product-button__add').on('click', function (event){
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (res){
            $('#cart .modal-content').html(res);
            $('.menu-quantity').html('('+$('.total-quantity').html() +')');
        },
        error: function (){
            alert("ERROR");
        }
    })
})

$('.modal-content').on('click','.btn-close', function (){

    $('#cart').modal('hide');
})

$('.modal-content').on('click','.delete', function (){
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res){
            $('#cart .modal-content').html(res);
            if ($('.total-quantity').html()){
                $('.menu-quantity').html('('+$('.total-quantity').html() +')');
            } else $('.total-quantity').html('(0)');

        },
        error: function (){
            alert("ERROR");
        }
    })
})
