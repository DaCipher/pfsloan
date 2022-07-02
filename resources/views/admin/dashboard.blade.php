<x-admin-layout title="Dashboard">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-10">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Applications <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_applications}}</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Users <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_users }}</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Administrators <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_admin }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Recent Apllications -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Recent Applications <span>| Today</span></h5>
                                    @if(count($recent_applications) > 0)
                                    @php
                                    $i = 0;
                                    @endphp
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover">
                                            <caption><a class="btn main-bg text-white" href="{{ route('applications') }}">View All</a></caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Annual Income</th>
                                                    <th>Application Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($recent_applications as $applicatant )

                                                @php
                                                $i++
                                                @endphp
                                                <tr>
                                                    <th scope="row"><a href="#">{{ $i; }}</a></th>
                                                    <td>{{ $applicatant->firstname }}</td>
                                                    <td>{{ $applicatant->lastname }}</td>
                                                    <td>${{ $applicatant->loan_amount }}</td>
                                                    <td><span class="badge bg-success">${{ $applicatant->income }}</span></td>
                                                    <td>{{ $applicatant->created_at->diffForHumans()}}</td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    @else

                                    <div>
                                        <h6>No Recent Application.</h6>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div><!-- End Recent Apllications -->

                    </div>
                </div>
                <!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
</x-admin-layout>