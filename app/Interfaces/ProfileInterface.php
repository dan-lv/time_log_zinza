<?php
namespace App\Interfaces;

interface ProfileInterface
{
    public function getProfile($userId);
    public function updateProfile($request, $userId);
    public function storeImage($request, $userId);
    public function createProfile($event);
}
