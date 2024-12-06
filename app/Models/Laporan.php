<?php
namespace App\Models;
use CodeIgniter\Model;
class Laporan extends Model
{
    protected $table                = 'laporan';
    protected $primaryKey           = 'id_laporan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['tanggal','total_pemasukan','total_pengeluaran'];
}