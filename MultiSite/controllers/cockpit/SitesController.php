<?php

namespace MultiSite\controllers\cockpit;

use app\controllers\cockpit\CockpitController;
use MultiSite\models\Site;

class SitesController extends CockpitController
{
    public function indexAction()
    {
        $sites = Site::findAll();

        $this->render('index', array(
            'sites' => $sites,
            'pageTitle' => '<i class="fa fa-snow"></i> Sites',
        ));
    }
}