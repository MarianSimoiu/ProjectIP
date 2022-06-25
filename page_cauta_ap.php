<?php 
 include "platform.php";

 $cod = $_GET['cod'];

 ?>
 
  
<head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
  <body>
  
   
    <form class="form_search_bar_ap">
       <div class="text-center_ap">
        <p>Caută apartament</p>
      
  
        <input type="text" class="form-control" id="search_ap" placeholder="Tip apartament"/>
        
          <table class="table_ap">
            <thead>
              <tr>
                <th>Număr</th>
                <th>Etaj</th>
                <th>Sumă</th>
                <th>Suprafată</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="output_ap"></tbody>
          </table>
      </div>
  </form>

    <script type="text/javascript">
    var cod_bloc = '<?php echo $cod ;?>';
      $(document).ready(function () {
        $("#search_ap").keypress(function () {
          $.ajax({
            type: "POST",
            url: "search_ap.php?cod=" + cod_bloc,
            data: {
              name: $("#search_ap").val(),
            },
            success: function (data) {
              $("#output_ap").html(data);
            },
          });
        });
      });
    </script>
  </body>
</html>
