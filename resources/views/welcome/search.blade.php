<div class="bg-main">
    <div class="container p-4">
        <div class="text-center">
            <h4>{{__('Search for Flight Tickets')}}</h4>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-md">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{__('One-Way')}}</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Round-Trip')}}</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">@include('welcome.search_type.one-way')</div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">@include('welcome.search_type.round-trip')</div>
                </div>
            </div>
        </div>
    </div>
</div>
