<?php

namespace App\Http\Controllers\Api;

use App\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'required|string',
            'position' => 'required|string',
            'resume'   => 'required|file|mimes:pdf,doc,docx|max:2048',
            'message'  => 'nullable|string',
        ]);

        // Define destination path
        $destinationPath = public_path('uploads/resumes');

        // Make sure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Get file and original name
        $resume = $request->file('resume');
        $fileName = time() . '_' . $resume->getClientOriginalName();

        // Move the file
        $resume->move($destinationPath, $fileName);

        // Save to database
        Application::create([
            'fullName' => $request->fullName,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'position' => $request->position,
            'resume'   => 'uploads/resumes/' . $fileName, // Relative public path
            'message'  => $request->message,
        ]);

        return response()->json([
            'message' => 'Application submitted and saved successfully',
        ]);
    }

}
