<?php

namespace App\Services;

use App\Mappers\Responses\LinkResponseMapper;
use App\RepositoryInterfaces\LinkRepositoryInterface;
use App\ServiceInterfaces\LinkServiceInterface;

class LinkService implements LinkServiceInterface
{   
    private $linkRepository;
    private $linkRepo;
    
    public function __construct(LinkRepositoryInterface $repository)
    {
        $this->linkRepository = $repository;
    }

    public function getMetaTags($str)
    {
      $pattern = '
      ~<\s*meta\s
    
      # using lookahead to capture type to $1
        (?=[^>]*?
        \b(?:name|property|http-equiv)\s*=\s*
        (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
        ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
      )
    
      # capture content to $2
      [^>]*?\bcontent\s*=\s*
        (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
        ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
      [^>]*>
    
      ~ix';
      
      if(preg_match_all($pattern, $str, $out))
        return array_combine($out[1], $out[2]);
      return array();
    }
    
    function getPageTitle($page) {
        if (!$page) return null;
    
        $matches = array();
    
        if (preg_match('/<title>(.*?)<\/title>/', $page, $matches)) {
            return $matches[1];
        } else {
            return null;
        }
    }

    public function getByUrl($url) {
        $l = $this->linkRepository->getByUrl($url);

        if (!$l) {
            $html = @file_get_contents($url);
            
            if ($html) {
                $meta = $this->getMetaTags($html);
                
                $l = $this->linkRepository->create([
                    'title' => $meta['og:title'],
                    'description' => @$meta['og:description'],
                    'url' => $url,
                    'image' => @$meta['og:image']
                ]);
            }
        }
        
        return $l;
    }
    public function create($data)
    {
        return $this->linkRepository->create($data);
    }

    public function update($appId, $data)
    {
        return $this->linkRepository->update($appId, $data);
    }

    public function getById($appId) {
        return $this->linkRepository->find($appId);
    }
}