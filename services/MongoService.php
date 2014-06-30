<?php
namespace Craft;

class MongoService extends BaseApplicationComponent
{
    protected $settings;
    protected $client;
    protected $db;
    protected $collections = array();

    public function init($collection=null)
    {
        parent::init();

        $this->settings = craft()->plugins->getPlugin('mongo')->getSettings();

        $this->client = new \MongoClient( 'mongodb://' . $this->connectionString() );

        if ( $this->settings->database )
        {
            $this->db($this->settings->database);
        }
    }

    protected function connectionString()
    {
        $connectionString = $this->settings->host . ':' . $this->settings->port;

        if ( $this->settings->username && $this->settings->password )
        {
            $connectionString = $this->settings->username . ':' . $this->settings->password . '@' . $connectionString;
        }

        return $connectionString . '/' . $this->settings->database;
    }

    public function client()
    {
        return $this->client;
    }

    public function db($database=null)
    {
        if ( ! is_null($database) ) $this->db = $this->client->{$database};

        return $this->db;
    }

    public function collection($collection)
    {
        if ( ! array_key_exists( $collection, $this->collections ) )
        {
            $this->collections[$collection] = &$this->db->{$collection};
        }

        return $this->collections[$collection];
    }

    public function id($id)
    {
        return new \MongoID($id);
    }

    public function code($code, $scope = null)
    {
        return new \MongoCode($code, $scope);
    }

    public function date($sec = null, $usec = 0)
    {
        if ( is_null( $sec ) ) $sec = time();

        return new \MongoDate($sec, $usec);
    }

    public function regex($string)
    {
        return new \MongoRegex($string);
    }

    public function int32($value)
    {
        return new \MongoInt32($value);
    }

    public function int64($value)
    {
        return new \MongoInt64($value);
    }
}