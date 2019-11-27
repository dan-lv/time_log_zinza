<?php
namespace App\Repositories;

use App\Interfaces\CheckInInterface;

class CheckInRepository extends BaseRepository implements CheckInInterface
{
    public function setCheckIn() { 
    	
    	$this->createTimeLog()->create([
            'check_in' => $this->setTime()->toTimeString(),
            'day' => $this->setTime()->toDateString(),
            'user_id' => $this->getUser()->id,
        ]);
    }
}
