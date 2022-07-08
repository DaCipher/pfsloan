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
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="loan_amount" id="loan_amount" class="form-control  @error('loan_amount') is-invalid @enderror" placeholder="Loan Amount*">

                                                @error('loan_amount')
                                                <span class="ms-3 invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                            </div>

                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="loan_purpose" id="loan_purpose" class="form-control  @error('loan_purpose')  is-invalid  @enderror" placeholder="Loan Purpose*">

                                                @error('loan_purpose')
                                                <span class="ms-3 invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="loan_duration" id="loan_duration" class="form-control  @error('loan_duration') is-invalid @enderror" placeholder="Loan Duration (in Months)*">

                                                @error('loan_duration')
                                                <span class="ms-3 invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror

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
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="first_name" id="firstname" class="form-control  @error('first_name') is-invalid @enderror" placeholder="First Name*">

                                            @error('first_name')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="middle_name" id="middlename" class="form-control  @error('middle_name')is-invalid @enderror" placeholder="Middle Name*">

                                            @error('middle_name')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="last_name" id="lastname" class="form-control  @error('last_name') is-invalid @enderror" placeholder="Last Name*">

                                            @error('last_name')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" wire:model.lazy="dob" id="dob" class="form-control  @error('dob') is-invalid @enderror" placeholder="Date of Birth: DD/MM/YYYY" maxlength="10">
                                          
                                                @error('dob')
                                                <span class="ms-3 invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone Number +1(215) 243-3344" maxlength="17">

                                            @error('phone')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="email" wire:model.lazy="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email*">

                                            @error('email')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

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
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="address" id="address" class="form-control  @error('address') is-invalid @enderror" placeholder="Street Address*">

                                            @error('address')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="zip" id="zip" class="form-control  @error('zip') is-invalid @enderror" placeholder="ZIP*">

                                            @error('zip')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="state" id="state" class="form-control  @error('state') is-invalid @enderror" placeholder="State*">

                                            @error('state')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-12 mb-4">
                                            <input style="border-radius: 15px;" type="text" wire:model.lazy="city" id="city" class="form-control  @error('city') is-invalid @enderror" placeholder="City*">

                                            @error('city')
                                            <span class="ms-3 invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror

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
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="employer" id="employer" class="form-control  @error('employer') is-invalid @enderror" placeholder="Employer Name">
                                             
                                                    @error('employer')
                                                    <span class="ms-3 invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                             
                                            </div>
                                            <div class="col-12 mb-4">
                                                <select style="border-radius: 15px;" wire:model.lazy="employment_type" id="employment_type" class="form-control  @error('employment_type') is-invalid @enderror">
                                                    <option value="">--- Select Employer Type ---</option>
                                                    <option value="Self">Self Employed</option>
                                                    <option value="fulltime">Full Time</option>
                                                    <option value="part-time">Part Time</option>
                                                    <option value="contract"> Contract</option>
                                                    <option value="casual">Casual</option>
                                                </select>
                                             
                                                    @error('employment_type')
                                                    <span class="ms-3 invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                            
                                            </div>
                                            <div class="col-12 mb-4">
                                                <input style="border-radius: 15px;" type="number" wire:model.lazy="income" id="income" class="form-control  @error('income') is-invalid @enderror" placeholder="Individual Annual Income*">
                                               
                                                    @error('income')
                                                    <span class="ms-3 invalid-feedback d-block">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
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
                                                <input style="border-radius: 15px;" type="text" wire:model.lazy="ssn" id="ssn" class="form-control  @error('ssn') is-invalid @enderror" placeholder="Social Security Number*" maxlength="11">

                                                @error('ssn')
                                                <span class="ms-3 invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror

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
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
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