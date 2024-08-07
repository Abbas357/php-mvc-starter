<?php 

namespace App\Controllers;

class HomeController extends Controller 
{
    public function index()
    {
        $data = [
            'title' => 'Home Page',
        ];
        return view('dashboard', $data);
    }

    public function data()
    {
        return view('layout-blank');
    }

    public function create()
    {
        // Code to show form for creating a new resource
    }

    public function store()
    {
        // Code to handle the form submission and save the new resource
    }

    public function show($id)
    {
        // Code to display a specific resource by its ID
    }

    public function edit($id)
    {
        // Code to show the form for editing a specific resource
    }

    public function update($id)
    {
        // Code to handle the form submission and update the resource
    }

    public function destroy($id)
    {
        // Code to delete a specific resource by its ID
    }
}