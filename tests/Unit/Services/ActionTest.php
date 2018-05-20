<?php

namespace Tests\Unit;

use App\Repositories\ActionRepository;
use App\Services\ActionService;
use Tests\BaseTest;
use Mockery as M;

class TestActionService extends BaseTest
{
    public function testServiceInstantiation() 
    {
	    $repositorySpy = M::spy(ActionRepository::class);
        
		$service = new ActionService($repositorySpy);

        $this->assertInstanceOf(ActionService::class, $service);
    }

    public function testActionUpdate() 
    {
	    
        $historyRepo = M::mock(ActionRepository::class)
            ->shouldReceive('update')
            ->once()
            ->withArgs(function($id, $data) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return (object)[
		            'id' => 1,
		            'name' => 'some action',
		            'tag' => 'some title',
		            'template' => 'some template'
	            ];
            })
            ->getMock();

        $service = new ActionService($historyRepo);

        $res = $service->update(1, [
	        'name' => 'some action',
            'tag' => 'some title',
            'template' => 'some template'
        ]);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('some action', $res->name);
        $this->assertEquals('some title', $res->tag);
        $this->assertEquals('some template', $res->template);
    }

    public function testActionCreateToken() 
    {
	    $ins = [
            'id' => 1,
            'name' => 'some action',
            'tag' => 'some title',
            'template' => 'some template'
        ];
	    //generateKey
        $historyRepo = M::mock(ActionRepository::class)
        	->shouldReceive('create')
            ->once()
            ->withArgs(function($data) {	            
	            return true;
            })
            ->andReturnUsing(function() use($ins) {
	            return (object)$ins;
            })
            ->getMock();

        $service = new ActionService($historyRepo);

        $res = $service->create($ins);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('some action', $res->name);
        $this->assertEquals('some title', $res->tag);
        $this->assertEquals('some template', $res->template);
    }
}










