<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/2/2017
 * Time: 8:47 PM
 */

namespace App\Repositories\Contracts;


interface IRepository
{
    public function getTable($tableName);
    public function createRecord(array $attributes);
    public function updateRecord($id, array $attributes);
    public function getAllRecords();
    public function getRecordById($id);
    public function getRecordByAttribute($column, $value);
    public function deleteRecord($id);
    //public function resetModel();
}