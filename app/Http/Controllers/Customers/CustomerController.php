<?php

namespace App\Http\Controllers\Customers;

use App\Models\Shop;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\CustomersRepository;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;

class CustomerController extends Controller
{

    private $customerRepository;

    public function __construct(CustomersRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Shop $shop)
    {
        //
        $data = $this->customerRepository->fetchAllCustomersForShop($shop);
        return view('customers.index', [
            'data' => $data,
            'shop' => $shop
        ]);
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
    public function store(StoreCustomerRequest $request, Shop $shop)
    {
        //
        $data = $request->except("_token");
        if($this->customerRepository->storeCustomer($data, $shop))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.created', ['title' => 'customer'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return response()->json([
            'status' => true,
            'data' => $this->customerRepository->showCustomer($id)
        ]);
    }

    /**
     * Show the form for importing resources.
     */
    public function importFile(Shop $shop)
    {
        //
    }

    /**
     * Import  resources in storage.
     */
    public function import()  
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $data = $request->except("_token");
        if($this->customerRepository->updateCustomer($data, $customer))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.updated', ['title' => 'customer'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        if($this->customerRepository->destroyCustomer($customer))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.deleted', ['title' => 'customer'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }
}
