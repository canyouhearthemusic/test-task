<?php

namespace App\Services;

use App\Models\Task;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetsService
{
    protected $spreadsheetId;
    protected $sheetName;

    public function __construct(string $spreadsheetId, string $sheetName)
    {
        $this->spreadsheetId = $spreadsheetId;
        $this->sheetName = $sheetName;
    }

    private function getSheetsInstance()
    {
        return Sheets::spreadsheet($this->spreadsheetId)->sheet($this->sheetName);
    }

    // Additional methods to interact with the sheets, such as append, remove, etc.
    public function createRow(Task $task)
    {
        $this->getSheetsInstance()->append([[
            'TASK_ID' => $task->id,
            'TITLE' => $task->title,
            'TEXT' => $task->text,
            'CREATED_AT' => $task->getRawOriginal('created_at'),
            'UPDATED_AT' => $task->getRawOriginal('updated_at'),
            'DONE_AT' => $task->getRawOriginal('done_at'),
        ]]);
    }

    public function updateRow(Task $task)
    {
//        $this->getSheetsInstance()->update()
    }






}
