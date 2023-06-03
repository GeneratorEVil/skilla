<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

use function Termwind\terminal;

class UserToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Bearer Token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::find(1);

        $tokenName = 'token_' . $user->id;
        $user->tokens()->where('name', $tokenName)->delete();
        $token = $user->createToken($tokenName, ['data']);
        
        $this->info($token->plainTextToken);
        //
    }
}
