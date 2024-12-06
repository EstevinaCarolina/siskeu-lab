<?php
namespace App\Controllers;
use App\Models\Pengeluaran;
class PengeluaranController extends BaseController
{
    protected $pengeluaran;
    function __construct()
    {
        $this->pengeluaran = new Pengeluaran();
    }
    public function index()
    {
		$data['vpengeluaran'] = $this->pengeluaran->findAll();
        return view('vpengeluaran/index', $data);
    }
    public function create()
    {
        $this->pengeluaran->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);
		return redirect('pengeluaran')->with('success', 'Data Added Successfully');
    }
    public function edit($id)
    {
        $this->pengeluaran->update($id, [
                'tanggal' => $this->request->getPost('tanggal'),
                'jumlah' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);
            return redirect('pengeluaran')->with('success', 'Data Updated Successfully');
    }
	public function delete($id){
        $this->pengeluaran->delete($id);
        return redirect('pengeluaran')->with('success', 'Data Deleted Successfully');
    }
}