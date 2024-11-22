<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
        return User::get();
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
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Log::error('Validation errors:', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create the user
        // Redirect to the user management page
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index');
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
        $data = User::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Aturan validasi yang benar
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari data user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Redirect ke halaman index atau sesuai kebutuhan
        return redirect()->route('user.index', $id)->with(['success' => 'Data Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by id
        $user = User::findOrFail($id);

        // Delete the user
        if($user){
            $user->delete();
        }

        // Redirect to the index page with a success message
        return redirect()->route('user.index')->with(['success' => 'User deleted successfully']);
    }
}
