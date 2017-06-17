<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag; //<--Jangan sampai lupa nambahin use App\Tag;
class DataController extends Controller
{
    //
	 public function index(Request $request)
    {
        if($request->get('cari')){
            $datas = Data::where("tagname", "LIKE", "%{$request->get('cari')}%")->paginate(5);
        }else{
            $datas = Data::paginate(5);
        }
        return response($datas);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $create = Data::create($input);
        return response($create);
    }

    public function edit($id)
    {
        $data = Data::find($id);
        return response($data);
    }

    public function update(Request $request,$id)
    {
        $input = $request->all();
        Data::where("id",$id)->update($input);
        $data = Data::find($id);
        return response($data);
    }

    public function destroy($id)
    {
        return Data::where('id',$id)->delete();
    }
}
?>