<?php
namespace Avana\EventBroadcast\Container;

require_once '../vendor/autoload.php';

use Illuminate\Container\Container;

class AppContainer extends Container
{
    public function isDownForMaintenance()
    {
        return false;
    }
}