<?php

namespace MultiSite\models;

use System\Model;

class Site extends Model
{
    protected $permittedColumns = array(
        'label',
        'host',
        'description'
    );
}
