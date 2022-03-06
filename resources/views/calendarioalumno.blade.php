<?php 
    use App\Models\Asignatura;

?>
@extends('layouts.user')
@section('Content')
<div id='calendar2'>
   
</div>
<!-- Modal -->
<div class="modal fade" id="evaluaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div>
 </div>
</div>
@endsection
<style>
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar2');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:"es",
            headerToolbar:{
                center:'title',
                left: 'prev,next today',
                right: 'dayGridMonth, timeGridWeek, listWeek'
            },
            dateClick: function(info) {
              $("#evaluaciones").modal("show");
            }
        });
        calendar.render();
        calendar.setOption('height', 700);
    });
</script>