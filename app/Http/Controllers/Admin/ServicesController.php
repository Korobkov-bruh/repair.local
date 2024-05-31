<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicesRequest $request)
    {
        Services::create($request->all());

        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $service = Services::findOrFail($id);

        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $service = Services::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicesRequest $request, String $id)
    {
        $service = Services::findOrFail($id);

        $service->update($request->all());

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
