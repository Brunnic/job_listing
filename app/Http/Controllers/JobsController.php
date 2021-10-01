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
}
