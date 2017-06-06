<?php

namespace MultiSite\controllers\cockpit;

use app\controllers\cockpit\CockpitController;
use Core\Session;

class MultiSiteController extends CockpitController
{
    public function changehostAction()
    {
        Session::set('site_id', $this->request->post['site_id']);
        $this->redirect($this->request->post['redirect']);
    }
}
