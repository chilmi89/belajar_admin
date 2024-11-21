<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // view dashboard

    public function dashboard()
    {
        return view('dashboard');
    }
    public function info()
    {
        return User::get(); // Return all users from the User model
    }


    public function index()
    {

        // Fetch the user data from the database
        $data = $this->info(); // Get the data from the info method

        // Return the view and pass the data
        return view('index', compact('data'));
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
