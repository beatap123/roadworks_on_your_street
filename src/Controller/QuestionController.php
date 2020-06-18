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
        $nazwaprzystanku = $_POST['przystanek'];
        //APIKey: a054cce1-28f7-4f3d-9b06-7d682f3bd9b6 -> dodać za pomocą odpowiedniej funkcji


            $client = HttpClient::createForBaseUri('https://api.um.warszawa.pl/api/action/dbtimetable_get?id=b27f4c17-5c50-4a5b-89dd-236b282bc499&name=nazwaprzystanku&apikey=wartość', 
                    [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv'],
                    'query' => [
                            'apikey' => 'a054cce1-28f7-4f3d-9b06-7d682f3bd9b6',
                            'name' => $nazwaprzystanku
                        ]    
            ]);
            $response = $client->request('GET', 'https://api.um.warszawa.pl/api/action/dbtimetable_get?id=b27f4c17-5c50-4a5b-89dd-236b282bc499&name=nazwaprzystanku&apikey=wartość', 
           [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv'],
                    'query' => [
                            'apikey' => 'a054cce1-28f7-4f3d-9b06-7d682f3bd9b6',
                            'name' => $nazwaprzystanku
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
	
       
        
}