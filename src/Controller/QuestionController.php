<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\DBAL\Driver\Connection;

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
        
        public function searching_street()
        {    
  
        
      
           
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
        
       
        /**
        * @Route("/test", name="test")
        */
       public function test(Connection $connection)
       {
           $dbc = $connection->fetchAssoc(
               "SELECT * FROM adresywaw WHERE dzielnica='Bemowo'"
           ); 

           print_r($dbc);
       }
}