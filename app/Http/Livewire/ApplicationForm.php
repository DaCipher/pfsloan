<?php

namespace App\Http\Livewire;

use Manny\Manny;
use Livewire\Component;
use App\Models\Application;
use App\Mail\AdminNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ApplicationForm extends Component
{
    public $loan_amount;
    public $loan_purpose;
    public $loan_duration;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $dob;
    public $phone;
    public $email;
    public $address;
    public $zip;
    public $state;
    public $city;
    public $employer;
    public $employment_type;
    public $income;
    public $ssn;

    public $totalSteps = 4;
    public $currentStep = 1;

    public $messages = [
        "income.min" => "Minimum income required is $3,000.",
        "income.integer" => "Enter valid income.",
        "loan_amount.min" => "Minimum loanable amount is $2,000.",
        "loan_amount.integer" => "Enter valid amount.",
        "dob.min" => "DOB must be in DD/MM/YYYY format.",
        "ssn.min" => "SSN must be in 111-11-1111 format.",
        "dob.before" => "You must be above 18years!",
        "loan_duration.min" => "Minimum loan duration is 2 months."
    ];
    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
    }

    public function validateData()
    {
        $date = new Carbon();
        $before = $date->subYears(18)->format('Y-m-d');
        if ($this->currentStep == 1) {
            $this->validate([
                "loan_amount" => "required|integer|min:2000",
                "loan_purpose" => "required|string|min:8",
                "loan_duration" => "required|numeric|min:2"
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                "first_name" => "required|alpha:min:4",
                "middle_name" => "nullable|alpha|min:4",
                "last_name" => "required|alpha|min:4",
                "dob" => "required|string|min:10|before:$before",
                "phone" => "required:min:10",
                "email" => "required|email"
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                "address" => "required|min:5",
                "zip" => "required|numeric|min:4",
                "state" => "required|string|min:4",
                "city" => "required|alpha|min:4"
            ]);
        }
    }

    public function updated($field)
    {
        if ($field == "phone") {

            $this->phone = Manny::mask($this->phone, "+1(111) 111-1111");
        }

        // if ($field == "dob") {
        //     $this->dob = Manny::mask($this->dob, "11/11/1111");
        // }

        if ($field == "ssn") {
            $this->ssn = Manny::mask($this->ssn, "111-11-1111");
        }
    }

    public function submitApplication()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 4) {
            $this->validate([
                "employer" => "required|string|min:4",
                "employment_type" => "required",
                "income" => "required|integer|min:3000",
                "ssn" => "required|min:11"
            ]);

            $inputDatas = [
                "loan_amount" => number_format($this->loan_amount),
                "loan_purpose" => $this->loan_purpose,
                "loan_duration" => $this->loan_duration,
                "firstname" => ucfirst($this->first_name),
                "middlename" => ucfirst($this->middle_name),
                "lastname" => ucfirst($this->last_name),
                "dob" => $this->dob,
                "phone" => $this->phone,
                "email" => $this->email,
                "address" => $this->address,
                "zip" => $this->zip,
                "state" => ucfirst($this->state),
                "city" => ucfirst($this->city),
                "employer" => ucfirst($this->employer),
                "employment_type" => ucfirst($this->employment_type),
                "income" => number_format($this->income),
                "ssn" => $this->ssn
            ];

            Application::create($inputDatas);

            Mail::to('admin@primefinancialsolution.com')
                ->send(new AdminNotification($inputDatas));
            session()->flash('success', "Application submitted!");
            session()->flash('ok', "Done");
            return redirect("/loan/apply/success");

            $this->reset();
        }
    }
    public function render()
    {
        return view('livewire.application-form');
    }
}
