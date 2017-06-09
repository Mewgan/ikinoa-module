<?php

namespace Jet\Modules\Ikinoa\Controllers;

use Jet\Models\Profession;
use Jet\Models\Theme;
use JetFire\Framework\System\Controller;

/**
 * Class FrontIkinoaController
 * @package Jet\Modules\Ikinoa\Controllers
 */
class FrontIkinoaController extends Controller
{

    /**
     * @return array
     */
    public function theme()
    {
        $domain = (isset($this->app->data['setting']['domain'])) ? $this->app->data['setting']['domain'] : '';
        $path = $domain . WEBROOT . 'site/';
        $professions = Profession::select('name', 'slug')->where('slug', 'IN', ['sport'])->get();
        $themes = Theme::repo()->frontList(['sport']);
        return compact('themes', 'professions', 'path');
    }

}