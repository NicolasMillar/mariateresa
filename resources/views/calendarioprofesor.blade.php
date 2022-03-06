<?php 
    use App\Models\Asignatura;

?>
@extends('layouts.userprofesor')
@section('Content')
    <div id='calendar'>
   
    </div>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <form action="">
             <select name="Curso" id="curso">
               <option selected="selected"> Seleccione un curso</option>
             </select>
             <h6>Seleccione un semestre</h6>
             <select name="Semestre" id="Semestre">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7</option>
               <option value="8">8</option>
               <option value="9">9</option>
               <option value="10">10</option>
             </select>
             <h6>descripcion de la evauacion o trabajo</h6>
             <input type="text" name="" id="">
           </form>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
         </div>
       </div>
     </div>
   </div>

@endsection
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:"es",
            headerToolbar:{
                center:'title',
                left: 'prev,next today',
                right: 'dayGridMonth, timeGridWeek, listWeek'
            },
            dateClick: function(info) {
              $("#exampleModal").modal("show");
            }
        });
        calendar.render();
        calendar.setOption('height', 700);
    });
    function myFunction() {
      
    }
</script>
