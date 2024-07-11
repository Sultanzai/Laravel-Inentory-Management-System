<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupDatabase extends Command
{
    protected $signature = 'backup:run';

    protected $description = 'Create a backup of the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $backupPath = resource_path('backups/' . date('Y-m-d_H-i-s') . '_backup.sql');
        $mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe'; // Adjusted path

        // Ensure the backups directory exists
        if (!is_dir(dirname($backupPath))) {
            mkdir(dirname($backupPath), 0755, true);
        }

        // Check and construct the command
        if (empty($password)) {
            $command = sprintf(
                '"%s" --user=%s --host=%s %s > "%s"',
                $mysqldumpPath,
                $username,
                $host,
                $database,
                $backupPath
            );
        } else {
            $command = sprintf(
                '"%s" --user=%s --password=%s --host=%s %s > "%s"',
                $mysqldumpPath,
                $username,
                $password, // Directly use the password
                $host,
                $database,
                $backupPath
            );
        }

        $this->info('Running command: ' . $command); // Debugging line

        $output = [];
        $result = null;
        exec($command, $output, $result);

        if ($result === 0) {
            $this->info('Backup completed successfully.');
            $this->info($backupPath);
        } else {
            $this->error('Backup failed.');
            $this->error('Error output: ' . implode("\n", $output));
        }
    }
}
