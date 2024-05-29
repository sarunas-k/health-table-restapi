<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IHealthRecordsRepository;
use Dotenv\Util\Regex;
use Illuminate\Support\Facades\File;
use Error;

class HealthRecordsRepository implements IHealthRecordsRepository {

    public function all(): string {
        return join('\r\n', preg_split('/\r\n/', File::get(storage_path('app/public/db.csv')), -1, PREG_SPLIT_NO_EMPTY));
    }

    public function get(?int $from, ?int $length): string {
        $list = File::get(storage_path('app/public/db.csv'));
        if (!$list)
            throw new Error('Error reading file.');

        if (!isset($from))
            return $list;

        $lines = preg_split('/\r\n/', $list, -1, PREG_SPLIT_NO_EMPTY);

        if (!$length || $length < 0)
            return json_encode(['rows' => join('\r\n', array_slice($lines, $from)), 'length' => count($lines) ]);
        else
            return json_encode(['rows' => join('\r\n', array_slice($lines, $from, $length)), 'length' => count($lines) ]);
    }
}