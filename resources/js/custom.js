// let stationForm = document.getElementById('vehicle-form');
//
// stationForm.addEventListener('submit', function (event) {
//     $('#category-table tbody tr').each(function() {
//         $('<input>', {
//             type: 'hidden',
//             name: 'vehicleCategories[]',
//             value: $(this).find(`input.vehicle-category-extra`).val()+`~`+$(this).find(`select.vehicle-category`).val()
//         }).appendTo(stationForm);
//     })
// })

let orderForm = document.getElementById('order-form');

orderForm.addEventListener('submit', function (event) {
    $('#cart-items-table tbody tr').each(function() {
        $('<input>', {
            type: 'hidden',
            name: 'orderItems[]',
            value: $(this).find(`input.item`).val()+`~`+$(this).find(`input.item-qty`).val()
        }).appendTo(orderForm);
    })
})
