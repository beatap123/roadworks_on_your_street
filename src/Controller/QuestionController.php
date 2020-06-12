<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Asset\Package;

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
        
	public function curl_get()
        
        {   $przepis = $_POST['przepis'];
            //$url="https://www.kwestiasmaku.com/szukaj?";
            //$get = array('search_api_views_fulltext' => $przepis);

            
            $client = HttpClient::create();
            // it makes an HTTP GET request to https://httpbin.org/get?token=...&name=...
            $response = $client->request('GET', 'https://www.kwestiasmaku.com/szukaj?', [
                'query' => [
                    'search_api_views_fulltext' => $przepis,
                ],
            ]);
            
            
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}
            
            echo "Poniżej znajdują się wyniki wyszukiwania hasła '$przepis'";
           //return new Response($content);
           }
           
           
           
           /**
            *@Route("/szukaj/cos")
            */

            public function getURL()
            { 
            $przepis = $_POST['przepis'];
            //$url="https://www.kwestiasmaku.com/szukaj?";
            //$get = array('search_api_views_fulltext' => $przepis);

            
            $client = HttpClient::create();
            // it makes an HTTP GET request to https://httpbin.org/get?token=...&name=...
            $response = $client->request('GET', 'https://www.kwestiasmaku.com/szukaj?', [
                'query' => [
                    'search_api_views_fulltext' => $przepis,
                ],
            ]);
            
            
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            $name = "Frame";
            $koniec = $this->getURL($content,$name,"GET"); 
            
            
            return $this->render('question/curl.html.twig',
                    ['result'=>$koniec]
            ); 
            }
            //
    

            /*return $this->render('question/curl.html.twig',
                    ['result'=>$response*/
              //);                            
                        
        
	
       
        
}