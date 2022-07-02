<section id="application">
    <div class="container">
        <div class="head text-center">
            <h3>Application Form</h3>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <form wire:submit.prevent="submitApplication" method="POST">
                    {{-- @csrf --}}
                    <!-- Step 1 Loan Information -->
                    @if ($currentStep == 1)
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between main-secondary-bg text-white">
                            <h5 class="card-title">Loan Information</h5>
                            <h5 class="card-title">Step 1/4</h5>
                        </div>
                        <div class="card-body">
                            <div class="rounded">
                                <div class="rounded">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="loan_amount" id="loan_amount" class="form-control" placeholder="Loan Amount*">
                                                <span class="text-danger">
                                                    @error('loan_amount')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="loan_purpose" id="loan_purpose" class="form-control" placeholder="Loan Purpose*">
                                                <span class="text-danger">
                                                    @error('loan_purpose')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="loan_duration" id="loan_duration" class="form-control" placeholder="Loan Duration (in Months)*">
                                                <span class="text-danger">
                                                    @error('loan_duration')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Step 2 Personal Information  -->
                    @if ($currentStep == 2)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between main-secondary-bg text-white">
                            <h5 class="card-title">Personal Information</h5>
                            <h5 class="card-title">Step 2/4</h5>
                        </div>
                        <div class="card-body">
                            <div class="rounded">
                                <div class="rounded">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="first_name" id="firstname" class="form-control" placeholder="First Name*">
                                            <span class="text-danger">
                                                @error('first_name')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="middle_name" id="middlename" class="form-control" placeholder="Middle Name*">
                                            <span class="text-danger">
                                                @error('middle_name')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="last_name" id="lastname" class="form-control" placeholder="Last Name*">
                                            <span class="text-danger">
                                                @error('last_name')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" wire:model.lazy="dob" id="dob" class="form-control" placeholder="Date of Birth: DD/MM/YYYY" maxlength="10">
                                            <span class="text-danger">
                                                @error('dob')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="phone" id="phone" class="form-control" placeholder="Phone Number +1(215) 243-3344" maxlength="17">
                                            <span class="text-danger">
                                                @error('phone')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="email" wire:model.lazy="email" id="email" class="form-control" placeholder="Email*">
                                            <span class="text-danger">
                                                @error('email')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    <!-- Step 3 Contact Address -->
                    @if ($currentStep == 3)
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between main-secondary-bg text-white">
                            <h5 class="card-title">Contact Address</h5>
                            <h5 class="card-title">Step 3/4</h5>
                        </div>
                        <div class="card-body">
                            <div class="rounded">
                                <div class="rounded">

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="address" id="address" class="form-control" placeholder="Street Address*">
                                            <span class="text-danger">
                                                @error('address')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="zip" id="zip" class="form-control" placeholder="ZIP*">
                                            <span class="text-danger">
                                                @error('zip')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="state" id="state" class="form-control" placeholder="State*">
                                            <span class="text-danger">
                                                @error('state')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="city" id="city" class="form-control" placeholder="City*">
                                            <span class="text-danger">
                                                @error('city')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Step 4 Employemnt Information  -->
                    @if ($currentStep == 4)
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between main-secondary-bg text-white">
                            <h5 class="card-title">Employment Information</h5>
                            <h5 class="card-title">Step 4/4</h5>
                        </div>
                        <div class="card-body">
                            <div class="rounded">
                                <div class="rounded">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="employer" id="employer" class="form-control" placeholder="Employer Name">
                                                <span class="text-danger">
                                                    @error('employer')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <select style="border-radius: 15px;" wire:model.lazy="employment_type" id="employment_type" class="form-control">
                                                    <option value="">--- Select Employer Type ---</option>
                                                    <option value="Self">Self Employed</option>
                                                    <option value="fulltime">Full Time</option>
                                                    <option value="part-time">Part Time</option>
                                                    <option value="contract"> Contract</option>
                                                    <option value="casual">Casual</option>
                                                </select>
                                                <span class="text-danger">
                                                    @error('employment_type')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="income" id="income" class="form-control" placeholder="Individual Annual Income*">
                                                <span class="text-danger d-block">
                                                    @error('income')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                                <span class="help-block" style="font-size: 0.7rem;"> Our minimum
                                                    individual annual
                                                    income is $3,000. Alimony, child support, or separate
                                                    maintenance income need
                                                    not be revealed if you do not wish to have it considered as a
                                                    basis for repaying
                                                    the loan.
                                                </span>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="ssn" id="ssn" class="form-control" placeholder="Social Security Number*" maxlength="11">
                                                <span class="text-danger">
                                                    @error('ssn')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Buttons  -->
                    <div class="card mt-3 border-0">
                        <div class="card-footer border-0 d-flex justify-content-between">
                            @if ($currentStep == 1)
                            <div></div>
                            @endif

                            @if ($currentStep > 1 AND $currentStep <= 4) <button type="button" class="btn px-5 main-secondary-bg text-white rounded" wire:click="decreaseStep">Back</button>
                                @endif
                                @if ($currentStep > 0 AND $currentStep <= 3) <button type="button" class="btn px-5 main-secondary-bg text-white rounded" wire:click="increaseStep">Next</button>
                                    @endif
                                    @if ($currentStep == 4)
                                    <button type="submit" class="btn px-5 main-secondary-bg text-white rounded">Submit</button>
                                    @endif
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.js') }}"></script>
</section>