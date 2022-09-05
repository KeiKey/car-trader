let stationForm = document.getElementById('vehicle-form');

stationForm.addEventListener('submit', function (event) {
    $('#category-table tbody tr').each(function() {
        $('<input>', {
            type: 'hidden',
            name: 'vehicleCategories[]',
            value: $(this).find(`input.vehicle-category-extra`).val()+`~`+$(this).find(`select.vehicle-category`).val()
        }).appendTo(stationForm);
    })
})
