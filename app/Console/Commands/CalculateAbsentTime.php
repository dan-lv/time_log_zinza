<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Interfaces\AbsentInterface;

class CalculateAbsentTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:absent-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Caculate Absent Time of Staff';

    private $absentRequestRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AbsentInterface $absentRequestRepository)
    {
        parent::__construct();

        $this->absentRequestRepository = $absentRequestRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->absentRequestRepository->calculateAbsentTime();
    }
}
