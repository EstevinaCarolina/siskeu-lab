<?php
namespace App\Controllers;
use App\Models\Pemasukan;
class PemasukanController extends BaseController
{
    protected $pemasukan;
    function __construct()
    {
        $this->pemasukan = new Pemasukan();
    }
    public function index()
    {
		$data['vpemasukan'] = $this->pemasukan->findAll();
        return view('vpemasukan/index', $data);
    }
    public function create()
    {
        $this->pemasukan->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);
		return redirect('pemasukan')->with('success', 'Data Added Successfully');
    }
    public function edit($id)
    {
        $this->pemasukan->update($id, [
                'tanggal' => $this->request->getPost('tanggal'),
                'jumlah' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);
            return redirect('pemasukan')->with('success', 'Data Updated Successfully');
    }

	public function delete($id){
        $this->pemasukan->delete($id);
        return redirect('pemasukan')->with('success', 'Data Deleted Successfully');
    }
}