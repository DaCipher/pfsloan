@component('mail::message')
# Hello Admin

A new loan application submitted. Kindly find the details below:<br>

<p>--------------------------------------------------------------------------</p>
<p><b>First Name: </b> {{ $data['firstname'] }} </p>
<p><b>Middle Name: </b> {{ $data['middlename'] }} </p>
<p><b>Last Name: </b> {{ $data['lastname'] }} </p>
<p><b>Email: </b> {{ $data['email'] }} </p>
<p><b>Phone: </b> {{ $data['phone'] }} </p>
<p><b>DOB: </b> {{ $data['dob'] }} </p>
<p><b>Address: </b> {{ $data['address'] }} </p>
<p><b>City: </b> {{ $data['city'] }} </p>
<p><b>State: </b> {{ $data['city']}} </p>
<p><b>ZIP: </b> {{ $data['zip'] }} </p>
<p><b>Employer: </b> {{ $data['employer'] }} </p>
<p><b>Employment Type: </b> {{ $data['employment_type'] }} </p>
<p><b>SSN: </b> {{ $data['ssn'] }} </p>
<p><b>Annual Income: </b> ${{ $data['income'] }} </p>
<p><b>Loan Amount: </b> ${{ $data['loan_amount'] }} </p>
<p><b>Loan Purpose: </b> {{ $data['loan_purpose'] }} </p>
<p><b>Loan Duration: </b> {{ $data['loan_duration'] }} Months </p>
<p>--------------------------------------------------------------------------</p>


<br>Thanks,<br>

<b>Web Master</b> <br>
{{ config('app.name') }}
@endcomponent