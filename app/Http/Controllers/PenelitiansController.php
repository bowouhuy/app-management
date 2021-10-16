<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Penelitian;

use DB;

class PenelitiansController extends Controller
{
  //
  public function __construct()
  {
    // $this->middleware('auth');
  }


  public function index(Request $request)
  {
    // dd(Auth::user());
    return view('penelitians.index', []);
  }

  public function create(Request $request)
  {
    return view('penelitians.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $penelitian = Penelitian::findOrFail($id);
    // dd($penelitian);
    return view('penelitians.add', [
      'model' => $penelitian    ]);
  }

  public function show(Request $request, $id)
  {
    $penelitian = Penelitian::findOrFail($id);
    return view('penelitians.show', [
      'model' => $penelitian    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM penelitians a ";
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
  $penelitian = null;
  if($request->id > 0) { $penelitian = Penelitian::findOrFail($request->id); }
  else {
    $penelitian = new Penelitian;
  }


  
    $penelitian->id = $request->id?:0;
    
  
      $penelitian->judul = $request->judul;
  
  
      $penelitian->pelaksana = $request->pelaksana;
  
  
      $penelitian->nidn_nim = $request->nidn_nim;
  
  
      $penelitian->program_studi = $request->program_studi;
  
  
      $penelitian->tahun = $request->tahun;
  
  
      $penelitian->jangka_waktu = $request->jangka_waktu;
  
  
      $penelitian->biaya = $request->biaya;
  
  
      $penelitian->lokasi = $request->lokasi;
  
  
      $penelitian->created_at = $request->created_at;
  
    //$penelitian->user_id = $request->user()->id;
  $penelitian->save();

  return redirect('/penelitians');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $penelitian = Penelitian::findOrFail($id);

  $penelitian->delete();
  return "OK";

}


}
