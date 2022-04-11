<div class="container py-4">
    <form>
        @csrf
        <div class="row">
            <div class="col-lg mb-3">
                <input type="text" class="form-control">
            </div>
            <div class="col-lg mb-3">
                <div class="row">
                    <div class="col-6 text-center">Passenger</div>
                    <div class="col-6">
                        <input type="number" class="form-control" value="1">
                    </div>
                </div>
            </div>
            <div class="col-lg mb-3">
                <button class="btn btn-blue btn-block" type="submit">{{__('Search')}}</button>
            </div>
        </div>
    </form>
</div>
