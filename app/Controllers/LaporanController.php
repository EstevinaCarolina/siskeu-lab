<?php
namespace App\Controllers;
use App\Models\Laporan;
class LaporanController extends BaseController
{
    protected $laporan;
 
    function __construct()
    {
        $this->laporan = new Laporan();
    }
    public function index()
    {
		$data['vlaporan'] = $this->laporan->findAll();
        return view('vlaporan/index', $data);
    }

    public function create()
    {
        $this->laporan->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'total_pemasukan' => $this->request->getPost('total_pemasukan'),
            'total_pengeluaran' => $this->request->getPost('total_pengeluaran'),
        ]);
		return redirect('laporan')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $this->laporan->update($id, [
                'tanggal' => $this->request->getPost('tanggal'),
                'total_pemasukan' => $this->request->getPost('total_pemasukan'),
                'total_pengeluaran' => $this->request->getPost('total_pengeluaran'),
            ]);
            return redirect('laporan')->with('success', 'Data Updated Successfully');
    }

	public function delete($id){
        $this->laporan->delete($id);
        return redirect('laporan')->with('success', 'Data Deleted Successfully');
    }

}