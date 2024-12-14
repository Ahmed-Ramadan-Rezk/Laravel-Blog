<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ asset($user->avatar ?? 'images/avatars/default.png') }}" alt="Profile"
                        class="rounded-circle" loading="lazy">
                    <h2>{{ $user->name }}</h2>
                    <h3>{{ $user->job ?? '' }}</h3>
                    <div class="social-links mt-2">
                        <a href="{{ $user->twitter ?? '#' }}" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="{{ $user->facebook ?? '#' }}" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $user->instagram ?? '#' }}" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $user->linkedin ?? '#' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        {{ $tabs }}

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if ($user->about)
                            <h5 class="card-title">About</h5>
                            <p class="small fst-italic">{{ $user->about }}</p>
                            @endif

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                            </div>

                            @if ($user->company)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company</div>
                                <div class="col-lg-9 col-md-8">{{ $user->company }}</div>
                            </div>
                            @endif

                            @if ($user->job)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Job</div>
                                <div class="col-lg-9 col-md-8">{{ $user->job }}</div>
                            </div>
                            @endif

                            @if ($user->country)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8">{{ $user->country }}</div>
                            </div>
                            @endif

                            @if ($user->address)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $user->address }}</div>
                            </div>
                            @endif

                            @if ($user->phone)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                            </div>

                        </div>

                        {{ $slot }}

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
