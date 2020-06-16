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
        $przystanek = $_POST['przystanek'];
            //$url=https://api.um.warszawa.pl/api/action/dbstore_get?id=ab75c33d-3a26-4342-b36a-6e5fef0a3ac3&sortBy=id&apikey=wartość
            //$get = array('search_api_views_fulltext' => $przepis);

            
            $client = HttpClient::create();
            // it makes an HTTP GET request to https://httpbin.org/get?token=...&name=...
            $response = $client->request('GET', 'https://api.um.warszawa.pl/api/action/dbstore_get'
           );
            
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