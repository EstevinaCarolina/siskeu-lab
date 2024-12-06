<?php
namespace App\Models;
use CodeIgniter\Model;
class hutang extends Model
{
    protected $table                = 'hutang';
    protected $primaryKey           = 'id_hutang';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nama','tanggal','jumlah','keterangan'];
}