<?php

namespace App\Imports;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CustomersImport implements ToModel, WithHeadingRow, WithChunkReading
{
    
    protected $shop;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
        $user_id = $this->getUserId($row);
        $shop_id = $this->shop->id;
        if(!$user_id || !$shop_id)
        {
            return null;
        }

        Customer::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'location' => $row['location'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);
    }

    private function getUserId($row)  
    {
        $phoneNumber = $row['phone'];
        $user = User::where('phone', $phoneNumber)->first();
        if($user)
        {
            return $user->id;
        }else{
            $newUser = User::create([
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'phone' => $row['phone'],
                'email' => !empty($row['email']) ? $row['email'] : $row['first_name'].$row['last_name'].'@example.org',
                'gender' => Gender::getValue($row['gender']),
                'user_type' => UserType::CUSTOMER,
                'password' => Hash::make($row['first_name'].$row['last_name'].'@123456'),
            ]);
            return $newUser->id;
        }
    }
}
