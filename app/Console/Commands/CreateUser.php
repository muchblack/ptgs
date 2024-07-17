<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createUser {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '建立使用者';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $email = $this->argument('email');
        $userName = explode('@', $email)[0];
        $password = $this->argument('password');

        $user = Users::where('email', $email)->first();

        if($user)
        {
            echo "User Already Exists.\n";
        }
        else
        {
            Users::create([
                'email' => $email,
                'password' => Hash::make($password),
                'userName' => $userName,
            ]);

            echo "create User Success\n";
        }
    }
}
