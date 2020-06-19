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


            $client = HttpClient::createForBaseUri('https://api.um.warszawa.pl/api/action/wfsstore_get?id=e30b724d-0bac-4a4e-8ea8-085c136fe345&circle=21.02,52.21,1000&apikey=a054cce1-28f7-4f3d-9b06-7d682f3bd9b6', 
                    [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv'],
 
            ]);
            $response = $client->request('GET',    'https://api.um.warszawa.pl/api/action/wfsstore_get?id=e30b724d-0bac-4a4e-8ea8-085c136fe345&circle=21.02,52.21,1000&apikey=a054cce1-28f7-4f3d-9b06-7d682f3bd9b6', 
           [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv'],

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