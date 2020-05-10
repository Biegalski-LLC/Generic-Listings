<?php

namespace BiegalskiLLC\GenericListings\Repositories;

/**
 * Interface Repository
 * @package BiegalskiLLC\GenericListings\Repositories
 */
interface Repository
{
    /**
     * @param array|null $where
     * @param array|null $whereNot
     * @param array|null $with
     * @param null $orderBy
     * @return mixed
     */
    public function all(array $where = null, array $whereNot = null, array $with = null, $orderBy = null);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @return void
     */
    public function softDelete(int $id): void;

    /**
     * @param int $id
     * @return void
     */
    public function hardDelete(int $id): void;

    /**
     * @param int $id
     * @param array|null $with
     * @return mixed
     */
    public function show(int $id, array $with = null);

    /**
     * @param string $column
     * @param string $value
     * @return mixed
     */
    public function showByName(string $column, string $value);
}
