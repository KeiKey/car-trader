let stationForm = document.getElementById('vehicle-form');

stationForm.addEventListener('submit', function (event) {
    event.preventDefault();
    $('#category-table tbody tr').each(function() {
        $('<input>', {
            type: 'hidden',
            name: 'categories[]',
            value: $(this).find(`input.vehicle-category-extra`).val()+`~`+$(this).find(`select.vehicle-category`).val()
        }).appendTo(stationForm);
    })
})
