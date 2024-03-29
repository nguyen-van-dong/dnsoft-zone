<?php

namespace Module\ZoneModule\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Module\ZoneModule\Downloader;
use Module\ZoneModule\Imports\ZoneImport;
use Maatwebsite\Excel\Facades\Excel;

class DownloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dnsoft:zone-import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Module Zone Download Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Downloading...');

        $tmpFile = app(Downloader::class)->downloadFile();

        $this->info('Importing...');

        Excel::import(new ZoneImport(), $tmpFile);

        File::delete($tmpFile);

        $this->info('Completed');
    }
}
