<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesContoller extends Controller
{
    public function index() {
        return view('companies.index', [
            'companies' => Company::limit(12)->get()
        ]);
    }
}
