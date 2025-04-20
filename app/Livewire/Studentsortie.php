<?php

namespace App\Livewire;

use App\Models\Sortie;
use App\Models\Student;

use Illuminate\Support\Carbon ;
use Livewire\Component;

class Studentsortie extends Component
{

    public Student $student; //from the blade
    public $checked;//hear
    public $cons;//hear
    public $listeners=["setSortie"=>"setOrUpdateSortie"];


    public $currentSortie;

    public function mount($student)

    {

        $this->student = $student;
        $this->cons =($student->consigned== true);

        $this->currentSortie = $this->student->sortie();
        $this->checked = ($this->currentSortie !== null);
    }
    public function setprop($prop){
        if($this->checked){
            return $this->currentSortie->{$prop};
        }
        return null;
    }
    public function setOrUpdateSortie($choix,$from,$to){
        if(!$this->student->consigned){

            // $AttricutesToMatch=array_merge(['student_id' => $this->student->id ], $sortieRadio);
         $sortie=Sortie::updateOrCreate(
            [
               'student_id' => $this->student->id,
                'choix' => $this->setprop("choix"),
                'from' => $this->setprop("from"),
                'to' => $this->setprop("to")
            ],
            [

                'choix' => $choix,
                'from' => $from,
                'to' => $to,
            ]

         );
         $this->checked=true;
         $this->currentSortie = Sortie::where('student_id', $this->student->id)->first();


    }

    }
    public function render()
    {
        return view('livewire.studentsortie');
    }
}
