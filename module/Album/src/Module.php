<?php
namespace Album;

use Album\Model\AlbumTable;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\View\Model\ModelInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig(){
        return [
            'fectories' => [
              Model\AlbumTable ::class => function($container){
                    $tableGateway = $container ->get(Model\AlbumTableGateway::class);
                    return new AlbumTable($tableGateway);
              },
              Model\AlbumTableGateway::class => function($container){
                
                $dbAdapter = $container->(AdapterInterface::class);
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype -> setArrayObjectPrototype(new Model\Pessoa());
                return new TableGateway('Album',$dbAdapter,null,$resultSetPrototype);
            },
            ]
        ];
    }
}