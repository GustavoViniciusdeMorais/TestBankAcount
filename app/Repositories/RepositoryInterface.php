<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function getAll();
    public function store($data);
    public function update($id, $data);
    public function findById($id);
    public function resolveEntity(): Model;
}
