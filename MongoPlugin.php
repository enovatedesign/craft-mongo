<?php
namespace Craft;

class MongoPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Mongo';
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Enovate Design';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.enovate.co.uk';
    }

    public function defineSettings()
    {
        return array(
            'host'      => array( AttributeType::String, 'default' => craft()->config->get('host',      'mongo') ),
            'port'      => array( AttributeType::Number, 'default' => craft()->config->get('port',      'mongo') ),
            'username'  => array( AttributeType::String, 'default' => craft()->config->get('username',  'mongo') ),
            'password'  => array( AttributeType::String, 'default' => craft()->config->get('password',  'mongo') ),
            'database'  => array( AttributeType::String, 'default' => craft()->config->get('database',  'mongo') ),
        );

    }

    public function getSettingsHtml()
    {
        $config = array(
            'host'      => (string)  craft()->config->get('host',       'mongo'),
            'port'      => (integer) craft()->config->get('port',       'mongo'),
            'username'  => (string)  craft()->config->get('username',   'mongo'),
            'password'  => (string)  craft()->config->get('password',   'mongo'),
            'database'  => (string)  craft()->config->get('database',   'mongo'),
        );

        return craft()->templates->render('mongo/_settings', array(
            'settings' => $this->getSettings(),
            'config'   => $config
        ));
    }

    public function hasCpSection()
    {
        return false;
    }
}
