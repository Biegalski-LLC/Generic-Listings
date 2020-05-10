<?php

namespace BiegalskiLLC\GenericListings\Services;

/**
 * Class BaseService
 * @package BiegalskiLLC\GenericListings\Services
 */
class BaseService implements Service
{
    /**
     * @var
     */
    protected $repository;

    /**
     * BaseService constructor.
     * @param $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array|null $where
     * @param array|null $whereNot
     * @param array|null $with
     * @param null $orderBy
     * @return mixed
     */
    public function all(array $where = null, array $whereNot = null, array $with = null, $orderBy = null)
    {
        return $this->repository->all($where, $whereNot, $with, $orderBy);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * @param int $id
     */
    public function softDelete(int $id): void
    {
        $this->repository->softDelete($id);
    }

    /**
     * @param int $id
     */
    public function hardDelete(int $id): void
    {
        $this->repository->hardDelete($id);
    }

    /**
     * @param int $id
     * @param array|null $with
     * @return mixed
     */
    public function show(int $id, array $with = null)
    {
        return $this->repository->show($id, $with);
    }

    /**
     * @param string $column
     * @param string $value
     * @return mixed
     */
    public function showByName(string $column, string $value)
    {
        return $this->repository->showByName($column, $value);
    }
}
