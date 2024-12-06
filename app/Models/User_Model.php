<?php
namespace App\Models;
use CodeIgniter\Model;
Class User_Model extends Model{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $useAutoIncrement = "id_user";
    protected $returnType = "array";
    protected $allowedFields = ["username", "password"];
}