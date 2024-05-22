<?php

namespace App\Repositories\Interfaces;

interface IHealthRecordsRepository {

    public function all(): string;
    public function get(?int $from, ?int $length): string;

}