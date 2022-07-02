<x-admin-layout title="Admins">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Adminstrators</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">View</a></li>
                    <li class="breadcrumb-item active">Admins</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section dashboard">
            <div class="bs-canvas-overlay bs-canvas-anim bg-dark position-fixed w-100 h-100"></div>
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <!-- Details Side bar  -->

                    <div class="row">
                        <!-- Recent Apllications -->
                        <div class="col-10">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Administrators <span>| All</span></h5>
                                    @if(count($admins) > 0)
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
                                                    <span class="d-none d-md-inline-block">
                                                        <th scope="col">Email</th>
                                                    </span>

                                                    <th scope="col">Username</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="applications">
                                                @foreach ($admins as $admin )

                                                @php
                                                $i++
                                                @endphp
                                                <tr>
                                                    <th class="main-color">{{ $i; }}</th>
                                                    <td>{{ $admin->firstname." ". $admin->lastname }}</td>
                                                    <span class="d-none d-md-inline">
                                                        <td>{{ $admin->email }}</td>
                                                    </span>

                                                    <td>{{$admin->username}}</td>
                                                    <td><span class="">Admin</span></td>
                                                    <td class="d-flex juustify-content-between">
                                                        <i class="btn main-bg text-white me-1 bi bi-pencil-square" onclick="getAdmin('{{ $admin->id}}')" id="update-btn"></i>
                                                        <i class="btn main-bg text-white bi bi-key-fill" onclick="password('{{ $admin->id }}')"></i>
                                                        <form action="{{ route('deleteAdmin')}}" method="post" class="ms-1">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="id" value="{{ $admin->id }}">
                                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                            <caption class="btn btn-sm text-white main-bg" data-bs-toggle="modal" data-bs-target="#newAdminModal"><i class="bi bi-person-plus-fill me-1"></i><span class="d-none d-lg-inline-block">Add New Admin</span></caption>
                                        </table>
                                    </div>

                                    @else

                                    <div>
                                        <h6>No Administrators found.</h6>
                                        <div class="my-4">
                                            <div class="btn btn-sm text-white main-bg" data-bs-toggle="modal" data-bs-target="#newAdminModal"><i class="bi bi-person-plus-fill me-1"></i><span class="d-none d-lg-inline-block">Add New Admin</span></div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div><!-- End Recent Apllications -->

                    </div>
                </div>



                <!-- End Left side columns -->

            </div>


            <!-- Modal -->
            @livewire('update-admin')
            <script src="{{ asset('/js/jquery.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#applications tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });

                function getAdmin(id) {
                    window.livewire.emit('get-admin', {
                        'id': id
                    });
                    window.addEventListener('show-update-modal', () => $('#updateModal').modal('show'));
                }

                function password(id) {
                    window.livewire.emit('password', {
                        'id': id
                    });
                    window.addEventListener('show-password-modal', () => $('#passwordModal').modal('show'));
                }

                window.addEventListener('hide-password-modal', () => {
                    flasher.success('Password reset successfull!');
                    $('#passwordModal').modal('hide');
                });
            </script>
        </section>
    </main>
</x-admin-layout>