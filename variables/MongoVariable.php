<?php
namespace Craft;

class MongoVariable
{
    public function db($database = null)
    {
        return craft()->mongo->db($database);
    }

    public function collection($collection)
    {
        return craft()->mongo->collection($collection);
    }

    public function id($id)
    {
        return craft()->mongo->id($id);
    }

    public function code($code, $scope = null)
    {
        return craft()->mongo->code($code, $scope);
    }

    public function date($sec = null, $usec = 0)
    {
        return craft()->mongo->date($sec, $usec);
    }

    public function regex($string)
    {
        return craft()->mongo->regex($string);
    }

    public function int32($value)
    {
        return craft()->mongo->int32($value);
    }

    public function int64($value)
    {
        return craft()->mongo->int64($value);
    }
}