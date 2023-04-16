<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;
use App\Models\SponsorsModel;

class Detection extends BaseController
{
    protected $appInfoModel;
    protected $appFeatureModel;
    protected $beanDirectoryModel;
    protected $contentsModel;
    protected $faqModel;
    protected $sponsorsModel;
    protected $teamsModel;

    public function __construct()
    {
        $this->appInfoModel = new AppInfoModel();
        $this->sponsorsModel = new SponsorsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'CoffeeAI - Detection',
            'information' => $this->appInfoModel->getAppInformation(),
            'sponsors' => $this->sponsorsModel->getSponsors(),
        ];
        return view('homepage/detection', $data);
    }

    public function detect() // Under development
    {
        $client = new \CodeIgniter\HTTP\CURLRequest(
            new \Config\App(),
            new \CodeIgniter\HTTP\URI(),
            new \CodeIgniter\HTTP\Response(new \Config\App()),
        );

        $response = $client->request('GET', 'https://api.publicapis.org/entries');
        dd($response->getBody());
        return view('homepage/detection');
    }
}
