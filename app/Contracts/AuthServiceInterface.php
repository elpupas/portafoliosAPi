<?php
namespace App\Contracts;

interface AuthServiceInterface{
    public function verifyAttemp(array $credentials);
    public function revokeSession();
}
?>