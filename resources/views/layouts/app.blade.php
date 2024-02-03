<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf_token" content="{{ csrf_token() }}">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css " rel="stylesheet" >
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <title>
         Tasks
      </title>
   </head>
   <body >
      <style type="text/css">
         .home {
         padding:50px;
         }
         .heading{
         text-align:center;
         }
      </style>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="/tasks">Home</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container home">
         <div class="row">
            <h3 class="heading">Clinial Trial</h3>
            @yield('content')
         </div>
      </div>
      <footer class="text-center text-lg-start bg-body-tertiary text-muted">
         <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright
         </div>
      </footer>
   </body>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   <script>
      let table = new DataTable('#example');
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0',
            maxDate:"0"
         });

         $('#migrain_frequency').change(function(){ 
               var value = parseInt($(this).val());
               if(value == 1)
               {
                  $("#daily_frequency").show();
               }
               else
               {
                  $("#daily_frequency").hide();
               }
         });

        });
         
   </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>