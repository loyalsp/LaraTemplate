<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/2/2017
 * Time: 8:50 PM
 */

namespace Repositories\Eloquent;

use Repositories\Contracts\RepositoryInterface,
    Illuminate\Database\Eloquent\Model,
    Illuminate\Container\Container as App,
    Exception;

abstract class AbstractCommonBehaviors implements RepositoryInterface
{

    /**
     * @var App
     */
    private $app;
    /**
     * @var
     */
    protected $model;

    /**
     * @return mixed
     */
    abstract public function getModel();

    /**
     * CommonBehaviors constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @param $tableName
     * @return mixed
     */
    public function getTable($tableName)
    {
        return DB::table($tableName);
    }

    /**
     * @return mixed
     */
    public function getAllRecords()
    {
        return $this->model->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRecordById($id)
    {
        return $this->model->find($id);

    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function getRecordByAttribute($column, $value)
    {
        //parameter 1 is must be column name and the second parameter must be value of column
        return $this->model->where($column, $value)->first();
        //OR static context "return User::where($column,$att)->first();"
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function deleteRecordByAtt($column, $value)
    {
        //return true if success
        return $this->getRecordByAttribute($column,$value)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        return $this->getRecordById($id)->delete();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createRecord(array $attributes)
    {
        $created = $this->model->create($attributes);
        return $created;
    }


    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updateRecord($id, array $attributes)
    {
        $this->model = $this->getRecordById($id);
        return $this->model->update($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->getModel());

        if (!$model instanceof Model)
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    public function resetModel()
    {
        return $this->makeModel();
    }
}