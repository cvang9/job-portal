<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $job = Job::query();

        $job->when( request('search'), function( $query ){

            $query->where('title', 'like', '%'.request('search').'%' )
                  ->orWhere( 'description', 'like', '%'.request('search').'%' )
                  ->orWhereHas( 'employer', function( $query) {
                    $query->where('company_name', 'like', '%'.request('search').'%' );
                  });
        });

        $job->when( request('experience'), function( $query ){
            $query->where('experience', '=', request('experience'));
        });

        $job->when( request('category'), function( $query ){
            $query->where('category', '=', request('category') );
        });

        if( request('min_salary') && request('max_salary') )
        {
            $job->whereBetween('salary', [ request('min_salary'), request('max_salary')])->orderBy('salary', 'desc');
            return view('job.index', [ 'jobs' => $job->get() ] );
        }

        $job->when( request('min_salary'), function( $query )  {
            $query->where( 'salary', '>=', request('min_salary') )->orderBy('salary', 'desc');
        });

        $job->when( request('max_salary'), function( $query ) {
            $query->where('salary', '<=', request('max_salary') )->orderBy('salary', 'desc');
        });
        

        if( request('min_salary') || request('max_salary') ) {
            return view('job.index', [ 'jobs' => $job->with('employer')->get() ] );
        }
        else {
            return view('job.index', [ 'jobs' => $job->with('employer')->paginate() ] );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', ['job' => $job->load('employer.jobs')] );
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
