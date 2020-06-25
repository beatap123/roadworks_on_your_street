<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class QuestionController extends AbstractController
{
     /**
	*@Route("/") 
	*/
	
	public function searching()
	{
                return $this->render('question/show.html.twig');
	}

    
	/**
	*@Route("/szukaj")
	*/
        
        public function bus_stops()
        {    
        //$nazwaprzystanku = $_POST['przystanek'];
        //APIKey: a054cce1-28f7-4f3d-9b06-7d682f3bd9b6 -> dodać za pomocą odpowiedniej funkcji

            $client = HttpClient::create();
            
            $response = $client->request('GET','https://api.um.warszawa.pl/api/action/wfsstore_get?id=a08136ec-1037-4029-9aa5-b0d0ee0b9d88&circle=21.02,52.21,1000', 
           [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv'],
                    'query' => [
                            'apikey' => 'a054cce1-28f7-4f3d-9b06-7d682f3bd9b6'
                            //'name' => $nazwaprzystanku
                        ]   
            ]);
            
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}
             
           return new Response($content);
        /*
        
	*/
           
            /*return $this->render('question/curl.html.twig',
                    ['result'=>new Response($content)]
              );      */                  
                        
        }
	
       /**
	*@Route("/pogoda")
	*/
        
        public function weather_api()
                
        {
            //APIKey: 360938ff9c895d925dc406829c29353a -> dodać za pomocą odpowiedniej funkcji

            $client = HttpClient::create();
            
            $response = $client->request('GET','http://api.openweathermap.org/data/2.5/weather?q=Warszawa', 
           
                    [        'auth_basic' => ['beatap', 'H7REvQ3pXiM3Xnc'],
                    'query' => [
                            'appid' => '360938ff9c895d925dc406829c29353a'
                            //'name' => $nazwaprzystanku JEST PROBLEM Z MAP SERVER
                        ]   
            ]);
            
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}
             
           return new Response($content);
        }
        
}