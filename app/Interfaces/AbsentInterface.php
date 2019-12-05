<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface AbsentInterface
{
    public function createAbsentRequest(Request $request, $userId);
    public function getAbsentByUserId($userId);
    public function getAbsentToday($userId);
}
