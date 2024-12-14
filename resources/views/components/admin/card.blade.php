@props(['title', 'cardClass'])

<div class="col-xxl-4 col-md-6">
    <div class="card info-card {{$cardClass}}-card">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    {{ $slot }}
                </div>
                <div class="ps-3">
                    <h6>{{ $count }}</h6>
                </div>
            </div>
        </div>

    </div>
</div>