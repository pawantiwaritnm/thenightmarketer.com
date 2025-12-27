<?php

namespace App\Jobs;

use App\Models\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateCareerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $careerId;
    protected $updatedData;

    public function __construct($careerId, $updatedData)
    {
        $this->careerId = $careerId;
        $this->updatedData = $updatedData;
    }

    public function handle()
    {
        // Find the career by ID
        $career = Career::find($this->careerId);

        if ($career) {
            // Update the career details
            $career->update($this->updatedData);
        }
    }
}
