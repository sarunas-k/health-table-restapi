<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HealthRecordsRepository;

class HealthRecordsController extends Controller
{
    private HealthRecordsRepository $repo;
    public function __construct(HealthRecordsRepository $repo) {
        $this->repo = $repo;
    }
    public function index(Request $request) {
        return $this->repo->all();
    }

    public function find(?int $from, ?int $length) {
        return $this->repo->get($from, $length);
    }
}
