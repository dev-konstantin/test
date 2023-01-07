<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create {first_name} {last_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $password = Str::random(10);
        $user = User::factory()->create([
            'first_name' => $this->argument('first_name'),
            'last_name' => $this->argument('last_name'),
            'password' => Hash::make($password)
        ]);

        $this->info('username - ' . $user->username);
        $this->info('password - ' . $password);

        return Command::SUCCESS;
    }
}
