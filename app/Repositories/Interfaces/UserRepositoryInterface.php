<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data, $id);

    public function update(array $data, $id);

    public function delete($id);
    
}
