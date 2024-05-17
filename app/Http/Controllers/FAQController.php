<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FAQ;



class FAQController extends Controller
{
    // public function index()
    // {
    //     // get all faqs from latest to oldest
    //     $faqs = FAQ::table('faqs')->orderByDesc('id')->get();
    //     return view('faq.index', compact('faqs'));
    // }


    // public function index()
    // {
    //     $faqModel = new FAQ(); // Create an instance of the FAQ model
    //     $tableName = $faqModel->getTable(); // Get the table name from the instance

    //     // Example of using raw SQL query with the table name
    //     $faqs = DB::table($faqs)->where('some_column', 'some_value')->get();

    //     // Return your view with $faqs data
    //     return view('faq.index', ['faqs' => $faqs]);
    // }
    
    public function adminIndex()
    {
        $faqs = FAQ::all(); // Retrieve all FAQs from the database
        return view('admin.faq.faq', compact('faqs'));
    }
    
    // public function index()
    // {
    //     $faqs = FAQ::all(); // Retrieve all FAQs from the database
    //     return view('admin.faq.faq', compact('faqs'));
    // }

    public function userIndex()
    {
        $faqs = FAQ::all(); // Retrieve all FAQs from the database
        return view('faq', compact('faqs'));
    }


    public function show($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('faq.show', compact('faq'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        // Create a new FAQ instance with the validated data
        $faq = new FAQ();
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];

        // Save the FAQ to the database
        $faq->save();

        // Redirect back with a success message
        return redirect()->route('admin.faq.index')->with('success', 'FAQ added successfully');
    }

    public function delete(Request $request, $id)
    {
        // Find the FAQ by ID
        $faq = FAQ::findOrFail($id);

        // Delete the FAQ
        $faq->delete();

        // Redirect back with a success message
        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully');
    }


    public function edit($id)
    {
        // Fetch the FAQ with the given ID
        $faq = FAQ::find($id);

        if (!$faq) {
            abort(404, 'FAQ not found'); // Display a 404 error if FAQ is not found
        }

        return view('admin.faq.edit', compact('faq')); // Return the edit view with the FAQ data
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
    
        // Find the FAQ record by ID
        $faq = FAQ::find($id);
    
        if (!$faq) {
            abort(404, 'FAQ not found');
        }
    
        // Update the FAQ record with validated data
        $faq->update($validatedData);

        return redirect('admin/faq/faq')->with('success', 'FAQ updated successfully');
    
        // return redirect()->route('faq.index')->with('success', 'FAQ updated successfully');
    }
    




}
