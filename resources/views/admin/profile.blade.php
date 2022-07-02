<x-admin-layout title="Profile">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Settings</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <!-- Details Side bar  -->

                <div class="row">
                    <!-- Recent Apllications -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">User <span>| Profile</span></h5>
                                <form method="POST" action="{{ route('updateProfile') }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value='{{ $profile->id }}'>

                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" id="firstname" aria-describedby="helpId" placeholder="" value="{{ $profile->firstname }}">
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid  @enderror" name="last_name" id="lastname" aria-describedby="helpId" placeholder="" value="{{ $profile->lastname }}">
                                        @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" disabled id="email" aria-describedby="helpId" placeholder="" value="{{ $profile->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" disabled id="username" aria-describedby="helpId" placeholder="" value="{{ $profile->username }}">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="d-grid gap-2 my-2">
                                        <button type="submit" class="btn main-bg text-white px-5">Update</button>
                                    </div>

                                </form>
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