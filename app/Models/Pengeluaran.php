<?php
namespace App\Models;
use CodeIgniter\Model;
class Pengeluaran extends Model
{
    protected $table                = 'pengeluaran';
    protected $primaryKey           = 'id_pengeluaran';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['tanggal','jumlah','keterangan'];
}