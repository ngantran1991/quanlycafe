<?php

namespace SM\Bundle\UserBundle\Plugins\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SM\Bundle\UserBundle\Constants\Messages;
use SM\Bundle\UserBundle\Constants\Configs;

abstract class SMController extends Controller
{

    /**
     * Get global manager to load repository
     *
     * @return Global manager
     */
    protected function globalManager()
    {
        $globalManager = $this->get('user.global.manager');
        return $globalManager;

    }

    public function checkLanguage($lang)
    {
        $listLanguage = Configs::getListLanguage();
        if (!in_array($lang, $listLanguage)) {
            $lang = 'fr';
        }
        return $lang;

    }
}
