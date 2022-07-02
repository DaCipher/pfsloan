<x-admin-layout title="Applications">

    <main class="main" id="main">

        <div class="pagetitle">
            <h1>Applications</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Applications</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="bs-canvas-overlay bs-canvas-anim bg-dark position-fixed w-100 h-100"></div>
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <!-- Details Side bar  -->

                    <div class="row">
                        <!-- Recent Apllications -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Applications <span>| All</span></h5>
                                    @if(count($applications) > 0)
                                    @php
                                    $i = 0;
                                    @endphp
                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover display" id="applications_table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col" class="d-none d-md-inline-block">Email</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Annual Income</th>
                                                    <th cope="col">Application Date</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="applications">
                                                @foreach ($applications as $applicant )

                                                @php
                                                $i++
                                                @endphp
                                                <tr>
                                                    <th scope="row" class="main-color">{{ $i; }}</th>
                                                    <td>{{ $applicant->firstname." ". $applicant->lastname }}</td>
                                                    <td scope="col">{{ $applicant->email }}</td>
                                                    <td>${{$applicant->loan_amount}}</td>
                                                    <td><span class="badge bg-success">${{ $applicant->income }}</span></td>
                                                    <td>{{ $applicant->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</td>
                                                    <td class="d-flex juustify-content-between">
                                                        <button class="btn main-bg text-white" id="view-{{ $applicant->id }}" data-toggle="canvas" data-target="#bs-canvas-right" aria-expanded="false" aria-controls="bs-canvas-right" data-id="{{ $applicant->id   }}">View</button>
                                                        <form action="{{ route('deleteApplication')}}" method="post" class="ms-1">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="id" value="{{ $applicant->id }}">
                                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    {!! $applications->links() !!}
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
            <div id="bs-canvas-right" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100">
                <header class="bs-canvas-header p-3 main-bg overflow-auto sticky-top">
                    <button type="button" class="bs-canvas-close float-left close bg-transparent border border-0" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                    <h5 class="d-inline-block text-light mb-0 ml-5">Application Details</h5>
                </header>
                <div class="bs-canvas-content px-3 py-2">
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">Full Name</div>
                        <span class="font-weight-bold" id="name"></span>
                    </div>
                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">Email</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="email"></span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Phone Number</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="phone"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Date of Birth</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="dob"></span>
                            </div>
                        </div>
                    </div>



                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">SSN</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="ssn"></span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Loan Amount</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="loan_amount"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Loan Duration</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="loan_duration"></span>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">Loan Purpose</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="loan_purpose"></span>
                    </div>
                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">Employer</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="employer"></span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Employment Type</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="employment_type"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Annual Income</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="income"></span>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">Address</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="address"></span>
                    </div>
                    <hr>
                    <div>
                        <div style="font-size: 0.7rem;" class="fw-bold">State</div>
                        <span style="font-size: 0.9rem;" class="font-weight-bold" id="state"></span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">City</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="city"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <div style="font-size: 0.7rem;" class="fw-bold">Zip</div>
                                <span style="font-size: 0.9rem;" class="font-weight-bold" id="zip"></span>
                            </div>
                        </div>
                    </div>

                    <hr>


                </div>
            </div>
        </section>
        <!-- Side Right Bar Details  -->

        <!-- End Side Right Bar Details  -->
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/admin/js/sidebar-overlay.js') }}"></script>
        <script src="{{ asset('/admin/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#applications tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </main>



</x-admin-layout>