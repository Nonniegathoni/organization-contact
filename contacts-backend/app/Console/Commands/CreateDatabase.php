<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;

class CreateDatabase extends Command
{
    protected $signature = 'db:create {name?}';
    protected $description = 'Create a new database';

    public function handle()
    {
        $databaseName = $this->argument('name') ?: config('database.connections.mysql.database');
        
        $connection = config('database.connections.mysql');
        
        // Create connection without database
        $pdo = new PDO(
            "mysql:host={$connection['host']};port={$connection['port']};",
            $connection['username'],
            $connection['password']
        );
        
        // Create database
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$databaseName}`");
        
        $this->info("Database '{$databaseName}' created successfully!");
    }
}