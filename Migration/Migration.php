<?php

namespace Migration;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;
    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    private $config;
    public function init()  {
        $this->config = require __DIR__ .'/../App/config/app.php';
        $this->capsule = new Capsule;
        $this->capsule->addConnection($this->config['settings']['db']);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}