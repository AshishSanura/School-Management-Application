<?php
namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    // Show all parents
    public function index()
    {
        $parents = Parents::all();
        return view('parents.index', compact('parents'));
    }

    // Show the form to create a new parent
    public function create()
    {
        return view('parents.create');
    }

    // Store a new parent in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email',
        ]);

        Parents::create($request->all());

        return redirect()->route('parents.index')->with('success', 'Parent added successfully');
    }

    // Show the form to edit an existing parent
    public function edit(Parents $parent)
    {
        return view('parents.edit', compact('parent'));
    }

    // Update the parent's details
    public function update(Request $request, Parents $parent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email,' . $parent->id,
        ]);

        $parent->update($request->all());

        return redirect()->route('parents.index')->with('success', 'Parent updated successfully');
    }

    // Delete a parent
    public function destroy(Parents $parent)
    {
        $parent->delete();

        return redirect()->route('parents.index')->with('success', 'Parent deleted successfully');
    }
}
