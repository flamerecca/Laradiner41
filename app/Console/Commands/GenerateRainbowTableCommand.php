<?php

namespace App\Console\Commands;

use AppendIterator;
use Generator;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class GenerateRainbowTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rainbow:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create rainbow table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $strings = new AppendIterator();
        $strings->append($this->generateString());
        foreach ($strings as $string) {
            Storage::append('file.txt', $string . ':' . md5($string));
        }
    }

    /**
     * @return Generator
     */
    private function generateString()
    {
        $characters = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        foreach ($characters as $character) {
                yield $character;
        }
    }
}
