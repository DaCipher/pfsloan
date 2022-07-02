<x-admin-layout title="Change Password">
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Change Password</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Settings</a></li>
                    <li class="breadcrumb-item active">Password</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <!-- Details Side bar  -->

                <div class="row">
                    <!-- Recent Apllications -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">User <span>| Password</span></h5>
                                <form method="POST" action="{{ route('changePassword') }}">
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" autocomplete="new-password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="helpId" placeholder="">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid  @enderror" name="password_confirmation" id="password_confirmation" aria-describedby="helpId" placeholder="">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                   
                                    <div class="d-grid gap-2 my-2">
                                        <button type="submit" class="btn main-bg text-white px-5">Change Password</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div><!-- End Recent Apllications -->

                </div>
            </div>



            <!-- End Left side columns -->

            </div>

        </section>
    </main>
</x-admin-layout>