<?php

namespace Tests\Unit;

use App\Mappers\Responses\HistoryResponseMapper;
use App\Repositories\HistoryRepository;
use App\Services\TimelineService;
use Tests\BaseTest;
use Mockery as M;

class TestTimelineService extends BaseTest
{
    public function testServiceInstantiation() 
    {
	    $repositorySpy = M::spy(HistoryRepository::class);
	    $mapperSpy = M::spy(HistoryResponseMapper::class);
        
		$service = new TimelineService($repositorySpy, $mapperSpy);

        $this->assertInstanceOf(TimelineService::class, $service);
    }

    public function testallUsersTimelines() 
    {
        $historyRepo = M::mock(HistoryRepository::class)
            ->shouldReceive('retrieveAllUserHistories')
            ->once()
            ->withArgs(function($id) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            $obj = json_decode('{"current_page":1,"data":[{"id":1,"user_id":1,"action_id":3,"product_id":4,"link_id":null,"additional_message":"Os Simpsons melhoraram em 40%!","sponsored":1,"created_at":null,"updated_at":null,"deleted_at":null,"action":{"id":3,"name":"Novo produto","tag":"NOVOPRODUTO","template":"criou novo produto: \"%product.name%\"","user_id":1,"created_at":null,"updated_at":null,"deleted_at":null},"product":{"id":4,"name":"Some product","image":"https:\/\/sire-media-foxpt.fichub.com\/generic\/photogallery-photo\/15\/38295.custom.jpg","user_id":1,"url":"http:\/\/www.simpsonsworld.com\/","created_at":null,"updated_at":null,"deleted_at":null},"link":null,"follows":{"user_id":1,"following_id":2,"following":{"id":2,"name":"Qe8Ky767yY","email":"Ew2tZCh1B3@gmail.com","avatar":"http:\/\/icons.iconarchive.com\/icons\/jonathan-rey\/simpsons\/256\/Marge-Simpson-icon.png","password":"uuu george","created_at":null,"updated_at":null,"deleted_at":null}}}],"first_page_url":"http:\/\/localhost:8000\/timeline?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost:8000\/timeline?page=1","next_page_url":null,"path":"http:\/\/localhost:8000\/timeline","per_page":10,"prev_page_url":null,"to":1,"total":1}');
                return (object) $obj;
            })
            ->getMock();
            

        $service = new TimelineService($historyRepo, new HistoryResponseMapper());

        $res = $service->allUsersTimelines(1);
        
        $expected = [
            'histories' => [
                [
                    "id" => 1,
                    "user" => [
                        "id" => 2,
                        "name" => "Qe8Ky767yY",
                        "avatar" => "http://icons.iconarchive.com/icons/jonathan-rey/simpsons/256/Marge-Simpson-icon.png",
                        "self" => ""
                    ],
                    "action" => "criou novo produto: \"%product.name%\"",
                    "product" => [
                        "name" => "Some product",
                        "url" => "http://www.simpsonsworld.com/",
                        "image" => "https://sire-media-foxpt.fichub.com/generic/photogallery-photo/15/38295.custom.jpg"
                    ],
                    "link" => null,
                    /*"link" => [
                        "title" => "",
                        "description" => "",
                        "url" => "",
                        "image" => ""
                    ],*/
                    "message" => "Os Simpsons melhoraram em <i>40%</i>!",
                    "sponsored" => true
                ]
            ],
            'pagination' => [
                "current_page" => 1,
                "first_page_url" => "http:\/\/localhost:8000\/timeline?page=1",
                "from" => 1,
                "last_page" => 1,
                "last_page_url" => "http:\/\/localhost:8000\/timeline?page=1",
                "next_page_url" => null,
                "path" => "http:\/\/localhost:8000\/timeline",
                "per_page" => 0,
                "prev_page_url" => null,
                "to" => 1,
                "total" => 1
            ]
        ];
        
        $this->assertEmpty(array_merge(array_diff($expected, $res), array_diff($res, $expected)));
    }
}










