<div>

    <!-- Update Admin Profile Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header main-bg text-white">
                    <h5 class="modal-title" id="updateModalLabel">Update Admin Profile</h5>
                    <button type="button" class="btn-close text-white d-flex align-items-center justify-content-center" style="border: 1px solid #fff; background: none; opacity: 1;" data-bs-dismiss="modal" aria-label="Close" wire:click="$emit('hide.bs.modal')"><span class="text-white">X</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" wire:submit.prevent='updateAdmin'>
                        @method('put')
                        <input type="hidden" wire:model.defer="admin_id" value='{{ $admin_id }}'>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control  @error('first_name') is-invalid @enderror" wire:model.defer="first_name" id="firstname" aria-describedby="helpId" placeholder="" value="{{ $first_name }}">
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid  @enderror" wire:model.defer="last_name" id="lastname" aria-describedby="helpId" placeholder="" value="{{ $last_name }}">
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email" id="email" aria-describedby="helpId" placeholder="" value="{{ $email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" wire:model.defer='username' class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="helpId" placeholder="" value="{{ $username }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn main-bg text-white px-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Reset Modal -->
    <div class="modal fade" id="passwordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header main-bg text-white">
                    <h5 class="modal-title" id="updateModalLabel">Reset Admin Password</h5>
                    <button type="button" class="btn-close text-white d-flex align-items-center justify-content-center" style="border: 1px solid #fff; background: none; opacity: 1;" data-bs-dismiss="modal" aria-label="Close" wire:click="$emit('hide.bs.modal')"><span class="text-white">X</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" wire:submit.prevent='changePassword' autocomplete="off">
                        <input type="hidden" wire:model.defer="admin_id" value='{{ $admin_id }}'>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" autocomplete="new-password" class="form-control  @error('password') is-invalid @enderror" wire:model.defer="password" id="password" aria-describedby="helpId" placeholder="" value="{{ $password }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirm Password</label>
                            <input type="password" autocomplete="new-password" class="form-control @error('password_confirm') is-invalid  @enderror" wire:model.defer="password_confirm" id="password_confirm" aria-describedby="helpId" placeholder="" value="{{ $password_confirm }}">
                            @error('password_confirm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn main-bg text-white px-5">Reset Pasword</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- New Admin Modal -->
    <div class="modal fade" id="newAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newAdminModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header main-bg text-white">
                    <h5 class="modal-title" id="newAdminModalLabel">Create New Admin</h5>
                    <button type="button" class="btn-close text-white d-flex align-items-center justify-content-center" style="border: 1px solid #fff; background: none; opacity: 1;" data-bs-dismiss="modal" aria-label="Close" wire:click="$emit('hide.bs.modal')"><span class="text-white">X</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" wire:submit.prevent='createAdmin'>
                        @method('put')
                        <input type="hidden" wire:model.defer="admin_id" value='{{ $admin_id }}'>

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control  @error('first_name') is-invalid @enderror" wire:model.defer="first_name" id="firstname" aria-describedby="helpId" placeholder="" value="{{ $first_name }}">
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid  @enderror" wire:model.defer="last_name" id="lastname" aria-describedby="helpId" placeholder="" value="{{ $last_name }}">
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email" id="email" aria-describedby="helpId" placeholder="" value="{{ $email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" wire:model.defer='username' class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="helpId" placeholder="" value="{{ $username }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for='password' class="form-label">Password</label>
                            <input type="password" wire:model.defer='password' class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="helpId" placeholder="" value="{{ $password }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirm Password</label>
                            <input type="password" wire:model.defer='password_confirm' class="form-control @error('password_confirm') is-invalid @enderror" id="password_confirm" aria-describedby="helpId" placeholder="" value="{{ $password_confirm }}">
                            @error('password_confirm')
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
        </div>
    </div>
</div>