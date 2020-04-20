<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Billing\BillingRepositoryInterface;
use App\Http\Repository\Log\LogRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use App\Services\BilligAPIService;

class BillingController extends Controller
{
    protected $billingInterface,$logInterface,$billingService;
    //
    public function __construct(BillingRepositoryInterface $billingInterface,LogRepositoryInterface $logInterface,BillingAPIService $billingService){
        $this->billingInterface = $billingInterface;
        $this->logInterface = $logInterface;
        $this->billingService = $billingService;
    }

    public function billing(Request $request){
        //fetch all users to be billed
        $billingInterfaceCondition = array("billed"=> 0);
        $data = $this->billingInterface->findByColumn($billingInterfaceCondition);

        //use guzzle aync post to sned a post request
        $client = new Client(['base_uri' => 'http://httpbin.org/']);
        $promises = [
            'image' => $client->postAsync('/image',[
                'json' => [
                        'company_name' => 'update Name'
                ],
            ]),
            'png'   => $client->postAsync('/image/png',[
                'json' => [
                        'company_name' => 'update Name'
                ],
            ]),
            'jpeg'  => $client->postAsync('/image/jpeg',[
                'json' => [
                        'company_name' => 'update Name'
                ],
            ]),
            'webp'  => $client->postAsync('/image/webp',[
                'json' => [
                        'company_name' => 'update Name'
                ],
            ])
        ];

        // Wait for the requests to complete, even if some of them fail
        $responses = Promise\settle($promises)->wait();

        //log the responses using the loginterface
        $this->logInterface->create($params);
    }
}
