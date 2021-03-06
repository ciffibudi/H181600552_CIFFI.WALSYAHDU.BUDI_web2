<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\KategoriPengumuman;

class PengumumanController extends Controller
{
    public function index(){
        $listPengumuman=Pengumuman::all();
            
    
        return view('pengumuman.index', compact('listPengumuman'));
        
    }
    
        public function show($id){
            $pengumuman=Pengumuman::find($id);

            if(empty($pengumuman)){
                return redirect(route('pengumuman.index'));
            }

            return view('pengumuman.show',compact('pengumuman'));
        }

        public function create(){

            $kategoriPengumuman= kategoriPengumuman::pluck('nama','id');

            return view('pengumuman.create',compact('kategoriPengumuman'));
        }
    
        public function store(Request $request){
            $input= $request->all();
    
            Pengumuman::create($input);
    
            return redirect(route('pengumuman.index'));
        }

        public function edit($id){
            $pengumuman=Pengumuman::find($id);
            $kategoriPengumuman= kategoriPengumuman::pluck('nama','id');
    
            if(empty($pengumuman)){
                return redirect(route('pengumuman.index'));
            }
    
            return view('pengumuman.edit',compact('pengumuman','kategoriPengumuman'));
        }
    
        public function update($id,Request $request){
            $Pengumuman=Pengumuman::find($id);
    
            $input=$request->all();
    
            if(empty($Pengumuman)){
                return redirect(route('pengumuman.index'));
            }
    
            $Pengumuman->update($input);
    
            return redirect(route('pengumuman.index'));
    
        }

        public function destroy($id){
            $Pengumuman=Pengumuman::find($id);
    
            if(empty($Pengumuman)){
                return redirect(route('pengumuman.index'));
            }
            $Pengumuman->delete();
            return redirect(route('pengumuman.index'));
        }

        public function trash(){
            $Pengumuman=Pengumuman::onlyTrashed(); 
    
            return view('pengumuman.index', compact('Pengumuman'));
        }      
}
