@if ($message = Session::get('success'))
    <div class="alert alert-success alert-success-ss">
        <div data-notify="container" class="col-11 col-sm-4 alert alert-success alert-dismissible animated fadeIn" role="alert" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;">
            <p class="mb-0">
                <span data-notify="title"></span>
                <span data-notify="message">{{ $message }}</span>
            </p>

            <a href="#" target="_blank" data-notify="url"></a>
            <a class="p-2 m-1 text-dark" href="" aria-label="Close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-danger-ss">
        <div data-notify="container" class="col-11 col-sm-4 alert alert-danger alert-dismissible animated" role="alert" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;">
            <p class="mb-0">
                <span data-notify="title"></span>
                <span data-notify="message">{{ $message }}</span>
            </p>

            <a href="#" target="_blank" data-notify="url"></a>
            <a class="p-2 m-1 text-dark" href="" aria-label="Close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
@endif
