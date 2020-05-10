<?php

namespace BiegalskiLLC\GenericListings\Repositories;

use Illuminate\Support\Facades\Log;

/**
 * Class BaseRepository
 * @package BiegalskiLLC\GenericListings\Repositories
 */
class BaseRepository implements Repository
{
    /**
     * @var
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
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
        $query = $this->model;

        /**
         * @desc Chain where clauses
         */
        if ( $where !== null && is_array($where) ){
            foreach ($where as $key => $value){
                $query = $query->where($key, '=', $value);
            }
        }

        /**
         * @desc Chain where no clauses
         */
        if ( $whereNot !== null && is_array($whereNot) ){
            foreach ($where as $key => $value){
                $query = $query->where($key, '!=', $value);
            }
        }

        /**
         * @desc Chain eager loaded relationships
         */
        if ( $with !== null && is_array($with) ){
            foreach ($with as $value){
                $query = $query->with($value);
            }
        }

        /**
         * @desc Chain order by clauses
         */
        if( $orderBy !== null ){
            switch( gettype($orderBy) )
            {
                case 'string':
                    $query = $query->orderBy($orderBy);
                    break;
                case 'array':
                    foreach( $orderBy as $key => $value )
                    {
                        $query = $query->orderBy( $key, $value );
                    }
                    break;
            }
        }

        return $query->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create(
            $data
        );
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        try {

            $this->model->where(
                'id', $id
            )->update($data);

            return true;

        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }

    /**
     * @param $id
     * @return void
     */
    public function softDelete(int $id): void
    {
        $this->model->where(
            'id', '=', $id
        )->delete();
    }

    /**
     * @param $id
     * @return void
     */
    public function hardDelete(int $id): void
    {
        $this->model->where(
            'id', '=', $id
        )->forceDelete();
    }

    /**
     * @param int $id
     * @param array|null $with
     * @return mixed
     */
    public function show(int $id, array $with = null)
    {
        $query = $this->model;

        /**
         * @desc Chain eager loaded relationships
         */
        if ( $with !== null && is_array($with) ){
            foreach ($with as $value){
                $query = $query->with($value);
            }
        }

        return $query->where(
            'id', '=', $id
        )->first();
    }

    /**
     * @param string $column
     * @param string $value
     * @return mixed
     */
    public function showByName(string $column, string $value)
    {
        return $this->model->where(
            $column, '=', $value
        )->first();
    }
}
