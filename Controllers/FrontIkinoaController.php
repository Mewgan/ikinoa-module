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
    public function index()
    {
        $response = $this->getThemes(3);
        $response['price'] = $this->app->data['setting']['payment'];
        unset($response['price']['stripe']);
        return $response;
    }

    /**
     * @return array
     */
    public function theme()
    {
        return $this->getThemes();
    }

    /**
     * @param null $max
     * @return array
     */
    private function getThemes($max = null)
    {
        $domain = (isset($this->app->data['setting']['domain'])) ? $this->app->data['setting']['domain'] : '';
        $path = $domain . WEBROOT . 'site/';
        $professions = Profession::select('name', 'slug')->where('slug', 'IN', ['sport'])->get();
        $themes = Theme::repo()->frontList(['sport'], $max);
        return compact('themes', 'professions', 'path');
    }

}