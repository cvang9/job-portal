<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('my_job_application.index', [ 'applications' => $user->jobApplications()->with('job')->get() ] );
    }

    public function destroy( JobApplication $myJobApplication )
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Application deleted successfully' );
    }
}
