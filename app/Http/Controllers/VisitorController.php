<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $visitors = Visitor::all(); // Retrieve all visitors
    return view('visitors.index', compact('visitors')); // Pass to a view
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('visitors.create'); // Return a form view
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric|unique:visitors',
        'email' => 'nullable|email',
    ]);

    Visitor::create($request->all()); // Insert into database
    return redirect()->route('visitors.index')->with('success', 'Visitor added successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $visitor = Visitor::findOrFail($id); // Retrieve the visitor by ID
    return view('visitors.show', compact('visitor')); // Pass visitor to the view
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $visitor = Visitor::findOrFail($id); // Find visitor by ID
    return view('visitors.edit', compact('visitor')); // Pass to a form view
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric|unique:visitors,phone,' . $id,
        'email' => 'nullable|email',
    ]);

    $visitor = Visitor::findOrFail($id);
    $visitor->update($request->all()); // Update in database
    return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $visitor = Visitor::findOrFail($id);
    $visitor->delete(); // Delete from database
    return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully.');
}

}
