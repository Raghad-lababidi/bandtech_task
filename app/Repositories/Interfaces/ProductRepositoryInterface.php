<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data, $id);

    public function update(array $data, $id);

    public function delete($id);

    public function productsByUserType();

    public function getPriceAttribute($price);
}
