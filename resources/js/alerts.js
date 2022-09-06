window.setTimeout(function () {
    $(".alert-success-ss").fadeTo(30000, 0).slideUp(30000, function () {
        $(this).remove();
    });
    $(".alert-danger-ss").fadeTo(300, 0).slideUp(30000, function () {
        $(this).remove();
    });
}, 5000);

window.showAlert = function (type, message = 'Alert message goes here') {
    if (type !== 'success' && type !== 'danger') {
        type = 'success'
    }

    const root = document.getElementById('page-container')

    const alert = document.createElement('div')
    alert.classList.add('alert')
    alert.classList.add(`alert-${type}`)
    alert.innerHTML = `
    <div data-notify="container" class="col-11 col-sm-4 alert alert-${type} alert-dismissible animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;">
        <p class="mb-0">
            <span data-notify="title"></span>
            <span data-notify="message">${message}</span>
        </p>

        <a href="#" target="_blank" data-notify="url"></a>
        <a class="p-2 m-1 text-dark cursor-pointer" aria-label="Close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">
            <i class="fa fa-times"></i>
        </a>
    </div>
    `

    const timeoutId = setTimeout(() => hideAlert(alert), 5000000)
    alert.querySelector('a[aria-label="Close"]').addEventListener('click', () => hideAlert(alert, timeoutId))

    root.appendChild(alert)
}

window.hideAlert = function (alert, timeoutId) {
    alert.remove()

    if (timeoutId) {
        clearTimeout(timeoutId)
    }
}
