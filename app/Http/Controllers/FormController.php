<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'about_the_project' => 'string',
        ]);
        $form = new \App\Models\Form();
        $form->full_name = $validatedData['full_name'];
        $form->phone = $validatedData['phone'];
        $form->about_the_project = $validatedData['about_the_project'] ?? null;
        $form->save();

        return response()->json(['message' => 'Form submitted successfully!'], 200);
    }
}
