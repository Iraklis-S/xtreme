<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AccountType;
use App\Models\UserAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the 'Admin' role using the 'web' guard
      

        $user = User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'SuperAdmin',
            'email' => 'admin@admin.com',
            'password' => 'igliigli',
        ]);

        // Assign the 'Admin' role to the user
        $user->assignRole('Admin');


        // Check if the user already has a user account and create one if not
        if (!$user->userAccount) {
            // Get the default account type (assuming ID 1 is for the 'Standard' type)
            $defaultAccountType = AccountType::where('type', 'Standard')->first();

            if ($defaultAccountType) {
                // Create the user account
                $account =  UserAccount::create([
                    'user_id' => $user->id,
                    'balance' => 0.00,
                    'currency' => 'USD',
                    'account_type_id' => $defaultAccountType->id
                ]);
            }
        }
    }
}
