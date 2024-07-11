<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class BackupController extends Controller
{
    public function createBackup()
    {
        $output = new BufferedOutput;
        Artisan::call('backup:run', [], $output);
        $outputText = $output->fetch();

        // Extract the backup path from the output text
        preg_match('/Backup completed successfully\.\s*(.*)/', $outputText, $matches);
        $backupPath = trim($matches[1] ?? 'Unknown location');

        return response()->json(['message' => 'Backup created successfully', 'path' => $backupPath]);
    }
}
