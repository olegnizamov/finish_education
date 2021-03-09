<?php
require_once __DIR__ . '/GuestBookRecord.php';

class GuestBook
{
    protected $path;
    protected $records = [];

    public function __construct()
    {
        $this->path = __DIR__ . '/../guestbd.txt';
        $this->records = $this->loadAllRecords();
    }

    public function loadAllRecords(): array
    {
        $result = [];
        if (file_exists($this->path)) {
            $lines = file($this->path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                $result[] = new GuestBookRecord($line);
            }
        }

        return $result;
    }

    public function getAllRecords(): array
    {
        return $this->records;
    }

    public function save()
    {
        $lines = [];
        foreach ($this->records as $record) {
            $lines[] = $record->getMessage();
        }
        file_put_contents($this->path, implode("\n", $lines));
    }

    public function add(GuestBookRecord $record)
    {
        $this->records[] = $record;
        return $this;
    }
}
