<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pengabdian;

use DB;

class PengabdiansController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('pengabdians.index', []);
  }

  public function create(Request $request)
  {
    return view('pengabdians.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $pengabdian = Pengabdian::findOrFail($id);
    return view('pengabdians.add', [
      'model' => $pengabdian    ]);
  }

  public function show(Request $request, $id)
  {
    $pengabdian = Pengabdian::findOrFail($id);
    return view('pengabdians.show', [
      'model' => $pengabdian    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM pengabdians a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE judul LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','judul','pelaksana','nidn_nim','program_studi','tahun','jangka_waktu','biaya','lokasi','created_at',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $pengabdian = null;
  if($request->id > 0) { $pengabdian = Pengabdian::findOrFail($request->id); }
  else {
    $pengabdian = new Pengabdian;
  }


  
    $pengabdian->id = $request->id?:0;
    
  
      $pengabdian->judul = $request->judul;
  
  
      $pengabdian->pelaksana = $request->pelaksana;
  
  
      $pengabdian->nidn_nim = $request->nidn_nim;
  
  
      $pengabdian->program_studi = $request->program_studi;
  
  
      $pengabdian->tahun = $request->tahun;
  
  
      $pengabdian->jangka_waktu = $request->jangka_waktu;
  
  
      $pengabdian->biaya = $request->biaya;
  
  
      $pengabdian->lokasi = $request->lokasi;
  
  
      $pengabdian->created_at = $request->created_at;
  
    //$pengabdian->user_id = $request->user()->id;
  $pengabdian->save();

  return redirect('/pengabdians');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $pengabdian = Pengabdian::findOrFail($id);

  $pengabdian->delete();
  return "OK";

}


}
