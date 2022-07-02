<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        "loan_amount",
        "loan_purpose",
        "loan_duration",
        "firstname",
        "middlename",
        "lastname",
        "dob",
        "phone",
        "email",
        "address",
        "zip",
        "state",
        "city",
        "employer",
        "employment_type",
        "income",
        "ssn"
    ];
}
