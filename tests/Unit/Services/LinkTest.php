<?php

namespace Tests\Unit;

use App\Repositories\LinkRepository;
use App\Services\LinkService;
use Tests\BaseTest;
use Mockery as M;

class TestLinkService extends BaseTest
{
    public function testServiceInstantiation() 
    {
	    $repositorySpy = M::spy(LinkRepository::class);
        
		$service = new LinkService($repositorySpy);

        $this->assertInstanceOf(LinkService::class, $service);
    }

    public function testLinkUpdate() 
    {
	    
        $historyRepo = M::mock(LinkRepository::class)
            ->shouldReceive('update')
            ->once()
            ->withArgs(function($id, $data) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return (object)[
		            'id' => 1,
		            'url' => 'http://uol.com.br',
		            'title' => 'some title'
	            ];
            })
            ->getMock();

        $service = new LinkService($historyRepo);

        $res = $service->update(1, [
	        'url' => 'http://uol.com.br',
		    'title' => 'some title'
        ]);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('http://uol.com.br', $res->url);
        $this->assertEquals('some title', $res->title);
    }

    public function testLinkCreateToken() 
    {
	    $ins = [
            'id' => 1,
            'url' => 'http://uol.com.br',
            'title' => 'some title'
        ];
	    //generateKey
        $historyRepo = M::mock(LinkRepository::class)
        	->shouldReceive('create')
            ->once()
            ->withArgs(function($data) {	            
	            return true;
            })
            ->andReturnUsing(function() use($ins) {
	            return (object)$ins;
            })
            ->getMock();

        $service = new LinkService($historyRepo);

        $res = $service->create($ins);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('http://uol.com.br', $res->url);
        $this->assertEquals('some title', $res->title);
    }
}










