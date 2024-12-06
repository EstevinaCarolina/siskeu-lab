<?php
namespace App\Models;
use CodeIgniter\Model;
class Pemasukan extends Model
{
    protected $table                = 'pemasukan';
    protected $primaryKey           = 'id_pemasukan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['tanggal','jumlah','keterangan'];
}