<?php

namespace App\Listeners;

use App\Events\TaskDoneEvent;
use App\Services\GoogleSheetsService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateRowInGoogleSheets implements ShouldQueue
{
    private $sheetsService;

    /**
     * Create the event listener.
     */
    public function __construct(GoogleSheetsService $sheetsService)
    {
        $this->sheetsService = $sheetsService;
    }

    /**
     * Handle the event.
     */
    public function handle(TaskDoneEvent $event): void
    {
        $this->sheetsService->createRow($event->task);
    }
}
