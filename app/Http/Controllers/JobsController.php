<?php

namespace App\Http\Controllers;

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
        $jt = $request->query('jt');

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
            $jobs = Job::where('title', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->get();

            return view('jobs.results', [
                'jobs' => $jobs,
                'query' => $query
            ]);
        }
        else {
            return view('jobs.results', [
                'jobs' => [],
                'query' => $query
            ]);
        }
    }
}
