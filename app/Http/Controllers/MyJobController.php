<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = auth()->user()->employer->jobs;
        return view('my_job.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->employer->jobs()->create([
            ...$request->validate([
                'title' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'salary' => 'required|numeric|min:5000',
                'description' => 'required|string',
                'category' => 'required|in:' . implode(',', Job::$category ),
                'experience' => 'required|in:' . implode(',', Job::$exp ),
            ])
        ]);

        return redirect()->route('my-jobs.index')->with('success', 'Successfully Registered a Job');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
