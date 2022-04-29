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

function clearCart(event){
    event.preventDefault();
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res){
            $('#cart .modal-content').html(res);
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
        },
        error: function (){
            alert("ERROR");
        }
    })
})

$('.modal').on('click','.btn-close', function (){
    console.log('123');
    $('#cart').modal('hide');
})

