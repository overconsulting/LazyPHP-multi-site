<?php

namespace MultiSite\controllers\cockpit;

use app\controllers\cockpit\CockpitController;
use MultiSite\models\Site;
use Core\Router;
use Core\Session;

class SitesController extends CockpitController
{
    public function indexAction()
    {
        $sites = Site::findAll();

        $this->render('multiSite::sites::index', array(
            'sites' => $sites,
            'pageTitle' => '<i class="fa fa-snowflake-o"></i> Gestion des sites',
            'blockTitle'    => 'Liste des sites'
        ));
    }

    public function showAction($id)
    {
        $site = Site::findById($id);

        $this->render('multiSite::sites::show', array(
            'site'          => $site,
            'pageTitle'     => '<i class="fa fa-snowflake-o"></i> Gestion des sites',
            'blockTitle'    => 'Fiche du site : '.$site->label,
        ));
    }

    public function newAction()
    {
        if (!isset($this->site)) {
            $this->site = new Site();
        }

        $this->render('multiSite::sites::edit', array(
            'pageTitle'     => '<i class="fa fa-snowflake-o"></i> Gestion des sites',
            'blockTitle'    => 'Nouveau site',
            'site'          => $this->site,
            'formAction'    => Router::url('cockpit_multisite_sites_create')
        ));
    }

    public function createAction()
    {
        $this->site = new Site();
        $this->site->setData($this->request->post);

        // if ($this->menu->valid()) {
        if ($this->site->create((array)$this->site)) {
            Session::addFlash('Site ajouté', 'success');
            $this->redirect('cockpit_multisite_sites_index');
        } else {
            Session::addFlash('Erreur insertion base de données', 'danger');
        };
        /*} else {
            Session::addFlash('Erreur(s) dans le formulaire', 'danger');
        }*/

        $this->newAction();
    }

    public function editAction($id)
    {
        if (!isset($this->site)) {
            $this->site = Site::findById($id);
        }

        $this->render('multiSite::sites::edit', array(
            'pageTitle'     => '<i class="fa fa-snowflake-o"></i> Gestion des sites',
            'blockTitle'    => 'Edition du site: '.$this->site->label,
            'site'          => $this->site,
            'formAction'    => url('cockpit_multisite_sites_update_'.$id)
        ));
    }

    public function updateAction($id)
    {
        if (!isset($this->request->post['active'])) {
            $this->request->post['active'] = 0;
        }

        $this->site = Site::findById($id);
        $this->site->setData($this->request->post);

        // if ($this->category->valid()) {
        if ($this->site->update((array)$this->site)) {
            Session::addFlash('Site modifiée', 'success');
            $this->redirect('cockpit_multisite_sites_index');
        } else {
            Session::addFlash('Erreur mise à jour base de données', 'danger');
        }
        /*} else {
            Session::addFlash('Erreur(s) dans le formulaire', 'danger');
        }*/

        $this->editAction($id);
    }

    public function deleteAction($id)
    {
        $site = Site::findById($id);
        $site->delete();
        Session::addFlash('Site supprimé', 'success');
        $this->redirect('cockpit_multisite_sites_index');
    }
}
