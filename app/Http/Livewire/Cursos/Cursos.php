<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Nivelcurso;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Cursos extends Component
{
   

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search, $paginate=5; 

    public $sort ='id', $direction='desc'; 

    public $nombre, $nivelcurso_id,$curso;
    
    protected $listeners = ['render','store','edit','resetear','destroy'];
    protected $rules = [
        'nombre' => 'required',
        'nivelcurso_id' => 'required',
    ];
   
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $cursos = Curso::where('nombre','like','%'.$this->search.'%')                        
                        ->orderBy($this->sort,$this->direction)
                        ->paginate($this->paginate);
       
        $nivelcursos="";
        if(Auth::user()->sucursale_id != ''){
            $nivelcursos = Nivelcurso::where('sucursale_id',Auth::user()->sucursale_id)->pluck('nombre','id');
        }else{
            $nivelcursos = Nivelcurso::all()->pluck('nombre','id');
        }
        
        $curso = new Curso();
        return view('livewire.cursos.cursos',compact('curso','cursos','nivelcursos'))->extends('layouts.app');
    }

    public function store()
    {  

        $curso = new Curso();
        $curso->nombre = $this->nombre;
        $curso->nivelcurso_id = $this->nivelcurso_id;
        $this->validate();      
        $curso->save();

        $this->reset('nombre','nivelcurso_id');
        $this->emit('alert','Curso creado correctamente');
    }

    public function edit($id){
        $this->curso = Curso::find($id);
        $this->nombre = $this->curso->nombre;
        $this->nivelcurso_id = $this->curso->nivelcurso_id;
    }

    public function destroy($id){
        $curso = Curso::find($id)->delete();
        $this->emit('alert','Curso eliminado correctamente');
    }

    public function resetear(){
        $this->reset('nombre','nivelcurso_id','curso');
    }

    public function update(){
        $this->curso->nombre = $this->nombre;
        $this->curso->nivelcurso_id = $this->nivelcurso_id;
        $this->validate();   
        $this->curso->save();
        $this->reset('nombre','nivelcurso_id','curso');
        $this->emit('alert','Curso editado correctamente');
    }

    public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }            
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }       
    }
}
