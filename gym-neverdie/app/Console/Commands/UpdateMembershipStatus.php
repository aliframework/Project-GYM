<?php

namespace App\Console\Commands;

use App\Models\Membership;
use Illuminate\Console\Command;

class UpdateMembershipStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membership:update-status';
    protected $description = 'Update the status of memberships to inactive if the end_date has passed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Membership::updateMembershipStatus();
        $this->info('Membership statuses updated successfully!');
    }
}
