<?php 
 include "platform.php";



 ?>
 
  
<head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
  <body>
  
   
    <form class="form_search_bar_cl">
       <div class="text-center_cl">
        <p>Caută client</p>
      
  
        <input type="text" class="form-control" id="search_cl" placeholder="Tip apartament"/>
        
          <table class="table_cl">
            <thead>
              <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Data nașterii</th>
                <th>Telefon</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody id="output"></tbody>
          </table>
      </div>
  </form>

    <script type="text/javascript">
      $(document).ready(function () {
        $("#search_cl").keypress(function () {
          $.ajax({
            type: "POST",
            url: "search_cl.php",
            data: {
              name: $("#search_cl").val(),
            },
            success: function (data) {
              $("#output").html(data);
            },
          });
        });
      });
    </script>
  </body>
</html>
