<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;
use App\Models\AppFeaturesModel;
use App\Models\BeanDirectoryModel;
use App\Models\ContentsModel;
use App\Models\FaqModel;
use App\Models\SponsorsModel;
use App\Models\TeamsModel;

class Home extends BaseController
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
        $this->appFeatureModel = new AppFeaturesModel();
        $this->beanDirectoryModel = new BeanDirectoryModel();
        $this->contentsModel = new ContentsModel();
        $this->faqModel = new FaqModel();
        $this->sponsorsModel = new SponsorsModel();
        $this->teamsModel = new TeamsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'CoffeeAI - Homepage',
            'information' => $this->appInfoModel->getAppInformation(),
            'features' => $this->appFeatureModel->getAppFeatures(),
            'beans' => $this->beanDirectoryModel->getBeans(),
            'contents' => $this->contentsModel->getContents(),
            'faqs' => $this->faqModel->getFaq(),
            'sponsors' => $this->sponsorsModel->getSponsors(),
            'teams' => $this->teamsModel->getTeams()
        ];
        return view('homepage/homepage', $data);
    }
}
