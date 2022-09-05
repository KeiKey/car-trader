<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <form action="{{ route('home') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="{{ request()->input('q') }}">

                <button type="submit" class="btn btn-outline-primary">{{ __('general.search') }}</button>
            </div>
        </form>
    </div>
</div>
