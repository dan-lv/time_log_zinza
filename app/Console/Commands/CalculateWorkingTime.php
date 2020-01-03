<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Interfaces\TimeLogInterface;

class CalculateWorkingTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:working-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Caculate Working Time of Staff';

    private $timeLogRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TimeLogInterface $timeLogRepository)
    {
        parent::__construct();

        $this->timeLogRepository = $timeLogRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->timeLogRepository->calculateWorkingTime();
    }
}
