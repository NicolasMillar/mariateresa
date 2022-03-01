<?php 
    use App\Models\Asignatura;

?>
@extends('layouts.userprofesor')
@section('Content')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
    </script>
    <div id='calendar'>
        
    </div>
@endsection
<style>
</style>
