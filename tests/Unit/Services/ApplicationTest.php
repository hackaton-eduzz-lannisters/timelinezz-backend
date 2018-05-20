<?php

namespace Tests\Unit;

use App\Repositories\ApplicationRepository;
use App\Services\ApplicationService;
use Tests\BaseTest;
use Mockery as M;

class TestApplicationService extends BaseTest
{
    public function testServiceInstantiation() 
    {
	    $repositorySpy = M::spy(ApplicationRepository::class);
        
		$service = new ApplicationService($repositorySpy);

        $this->assertInstanceOf(ApplicationService::class, $service);
    }

    public function testApplicationUpdate() 
    {
	    
        $historyRepo = M::mock(ApplicationRepository::class)
            ->shouldReceive('update')
            ->once()
            ->withArgs(function($id, $data) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return (object)[
		            'id' => 1,
		            'name' => 'new Name'
	            ];
            })
            ->getMock();

        $service = new ApplicationService($historyRepo);

        $res = $service->update(1, [
	        'name' => 'new Name'
        ]);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('new Name', $res->name);
    }
    public function testApplicationUpdateToken() 
    {
	    //generateKey
        $historyRepo = M::mock(ApplicationRepository::class)
        	->shouldReceive('update')
            ->once()
            ->withArgs(function($id, $data) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return (object)[
		            'id' => 1,
		            'name' => 'new Name',
		            'token' => 'some key'
	            ];
            })
            ->shouldReceive('updateToken')
            ->once()
            ->withArgs(function($id, $data) {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return true;
            })
            ->shouldReceive('generateKey')
            ->once()
            ->withArgs(function() {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return 'some key';
            })
            ->getMock();

        $service = new ApplicationService($historyRepo);

        $res = $service->updateToken(1);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('new Name', $res->name);
        $this->assertEquals('some key', $res->token);
    }
    public function testApplicationCreateToken() 
    {
	    $ins = [
            'id' => 1,
            'name' => 'new Name',
            'token' => 'some key'
        ];
	    //generateKey
        $historyRepo = M::mock(ApplicationRepository::class)
        	->shouldReceive('create')
            ->once()
            ->withArgs(function($data) {	            
	            return true;
            })
            ->andReturnUsing(function() use($ins) {
	            return (object)$ins;
            })
            ->shouldReceive('generateKey')
            ->once()
            ->withArgs(function() {	            
	            return true;
            })
            ->andReturnUsing(function() {
	            return 'some key';
            })
            ->getMock();

        $service = new ApplicationService($historyRepo);

        $res = $service->create($ins);
        
        $this->assertEquals(1, $res->id);
        $this->assertEquals('new Name', $res->name);
        $this->assertEquals('some key', $res->token);
    }
}










