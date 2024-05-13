<?php 

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Enums\UserType;
use App\Models\Shop;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomersRepository
{
    public function fetchAllCustomersForShop(Shop $shop)  
    {
        return $shop->customer()->with('user')->latest()->get();   
    }

    public function storeCustomer(array $attributes, Shop $shop)  
    {
        $fullnames = data_get($attributes, 'first_name').data_get($attributes, 'last_name');
        $user = User::create([
            'first_name' => data_get($attributes, 'first_name'),
            'last_name' => data_get($attributes, 'last_name'),
            'phone' => data_get($attributes, 'phone'),
            'gender' => data_get($attributes, 'gender'),
            'email' => data_get($attributes, 'email', $fullnames.'@example.org'),
            'password' => Hash::make(data_get($attributes, $fullnames.'@123456')),
            'user_type' => UserType::CUSTOMER,
        ]);

        $customer = Customer::create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'location' => data_get($attributes, 'location'),
            'status' => CustomerStatus::ACTIVE,
            'created_by' => data_get($attributes, 'user_id'),
            'updated_by' => data_get($attributes, 'user_id')
        ]);

        return $customer;
    }

    public function showCustomer($id)  
    {
        $customer = Customer::with(['user', 'shop'])->findOrFail($id);
        return $customer;
    }

    public function updateCustomer(array $attributes, Customer $customer)  
    {
        $user = $customer->user;
        $fullnames = data_get($attributes, 'first_name').data_get($attributes, 'last_name');
        $user->update([
            'first_name' => data_get($attributes, 'first_name'),
            'last_name' => data_get($attributes, 'last_name'),
            'phone' => data_get($attributes, 'phone'),
            'gender' => data_get($attributes, 'gender'),
            'email' => data_get($attributes, 'email', $fullnames.'@example.org'),
            'password' => Hash::make(data_get($attributes, $fullnames.'@123456'))
        ]);

        $customer->update([
            'user_id' => $user->id,
            'location' => data_get($attributes, 'location'),
            'updated_by' => data_get($attributes, 'user_id')
        ]);

        return $customer;
    }

    public function destroyCustomer(Customer $customer)  
    {
        $user = $customer->user;

        if($user->delete())
        {
            $customer->delete();
            return true;
        }
        return false;
    }

    public function getAllTrashed()  
    {
        
    }

    public function restoreCustomer()  
    {

    }

    public function forceDestroy()  
    {
        
    }
}