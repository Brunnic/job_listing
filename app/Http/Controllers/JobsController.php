<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index() {
        return view('jobs.index', [
            'searches' => session()->get('searches'),
        ]);
    }

    public function jobs(Request $request) {
        $query = $request->query('q');
        $j = $request->query('j');
        $page = $request->query('p') ? (int) $request->query('p') : 0;

        $searches = session()->get('searches');
        if(!isset($searches)) {
            $searches = [];
            array_push($searches, $query);
            session()->put('searches', $searches);
        } else {
            array_push($searches, $query);
            session()->put('searches', array_unique($searches));
        }

        if($query) {
            $jobs = Job::where('title', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->offset(8 * $page)->limit(8)->get();

            return view('jobs.results', [
                'jobs' => $jobs,
                'query' => $query,
                'j' => $j ? $j : null,
                'pages_count' => ceil($jobs->count() / 8),
                'current_page' => $page,
            ]);
        }
        else {
            return view('jobs.results', [
                'jobs' => Job::offset($page * 8)->limit(8)->get(),
                'query' => $query,
                'j' => $j ? $j : null,
                'pages_count' => ceil(Job::count() / 8),
                'current_page' => $page,
            ]);
        }
    }

    public function post() {
        return view('jobs.post');
    }

    public function create(Request $request) {
        $form = $request->except(['_token']);

        $company = Company::where('name', '=', $form['companyName'])->first();

        if($company) {
            Job::create([
                'title' => $form['jobTitle'],
                'description' => $form['jobDescription'],
                'job_type' => $form['job_type'],
                'company_id' => $company->id,
            ]);

            return redirect()->to('/jobs');
        } else {
            $newCompany = Company::create([
                'name' => $form['companyName']
            ]);

            Job::create([
                'title' => $form['jobTitle'],
                'description' => $form['jobDescription'],
                'job_type' => $form['job_type'],
                'company_id' => $newCompany->id,
            ]);
            
            return redirect()->to('/jobs');
        }
    }

    public function show($id) {
        $job = Job::findOrFail($id);

        return view('jobs.show', [
            'job' => $job
        ]);
    }
}
