<?php
namespace App\Controllers;
use App\Models\Hutang;
class HutangController extends BaseController
{
    protected $hutang;
    function __construct()
    {
        $this->hutang = new Hutang();
    }
    public function index()
    {
		$data['vhutang'] = $this->hutang->findAll();
        return view('vhutang/index', $data);
    }

    public function create()
    {
        $this->hutang->insert([
            'nama' => $this->request->getPost('nama'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);
		return redirect('hutang')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $this->hutang->update($id, [
                'nama' => $this->request->getPost('nama'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jumlah' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);
            return redirect('hutang')->with('success', 'Data Updated Successfully');
    }

	public function delete($id){
        $this->hutang->delete($id);
        return redirect('hutang')->with('success', 'Data Deleted Successfully');
    }

}