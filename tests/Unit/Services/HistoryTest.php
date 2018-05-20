<?php

namespace Tests\Unit;

use App\Repositories\LinkRepository;
use App\Repositories\HistoryRepository;
use App\Services\LinkService;
use App\Services\HistoryService;
use Tests\BaseTest;
use Mockery as M;

class TestHistoryService extends BaseTest
{
    public function testServiceInstantiation() 
    {
	    $repositorySpy = M::spy(HistoryRepository::class);
	    $linkSpy = M::spy(LinkService::class);
        
		$service = new HistoryService($repositorySpy, $linkSpy);

        $this->assertInstanceOf(HistoryService::class, $service);
    }

    public function testHistoryCreate() 
    {
	    $ins = [
            'id' => 1,
            'sponsored' => true,
            'url' => 'http://uol.com.br',
            'link_id' => 2
        ];
	    //generateKey
        $historyRepo = M::mock(HistoryRepository::class)
        	->shouldReceive('create')
            ->once()
            ->withArgs(function($data) {	            
	            return true;
            })
            ->andReturnUsing(function() use($ins) {
	            return (object)$ins;
            })
            ->getMock();
            
        $linkService = M::mock(LinkService::class)
        	->shouldReceive('getByUrl')
            ->once()
            ->withArgs(function($url) {	 
	            $this->assertEquals($url, 'http://uol.com.br');           
	            return true;
            })
            ->andReturnUsing(function() use($ins) {
	            return (object)[
		            'title' => 'some title',
		            'id' => 2,
		            'description' => 'some description'
	            ];
            })
            ->getMock();

        $service = new HistoryService($historyRepo, $linkService);

        $res = $service->create($ins);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals(2, $res->link_id);
        $this->assertEquals(1, $res->sponsored);
    }
}










