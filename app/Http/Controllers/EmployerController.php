<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|min:1'
        ]);
        
        auth()->user()->employer()->create([
            'company_name' => $validated['company_name']
        ]);

        return redirect()->route('jobs.index')->with('success', 'Successfully created employer');
    }
    
}
