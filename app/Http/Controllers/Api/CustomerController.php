<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer; // de la carpeta Models
use App\Http\Requests\StoreCustomerRequest; //de la carpeta Requests
use App\Http\Requests\UpdateCustomerRequest;//de la carpeta Requests
use App\Http\Resources\CustomerResource;//de la carpeta Resources
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return CustomerResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->validated());
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $nombreCompleto = $customer->full_name;
        $customer->delete();
        return response()->json([
            'status' => 'success',
            'message' => "El cliente {$nombreCompleto} fue eliminado correctamente"
        ], 200);
    }
}
