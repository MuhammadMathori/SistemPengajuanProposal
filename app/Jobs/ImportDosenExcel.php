<?php

namespace App\Jobs;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DosenImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportDosenExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function handle()
    {
        $path = public_path($this->file);

        Excel::import(new DosenImport, $path);
    }
}
