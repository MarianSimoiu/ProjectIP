<?php 
include 'platform.php';

?>


<div class="factura-form">
    <div class="date_fact">
    <p>Introduceți datele facturii:</p>
    </div>
    <form action="adauga_factura.php" method="POST">
     <label for="nume_client">Nume client:</label>
     <input type="text" name="nume_client">
     <label for="suma">Suma:</label>
     <input type="text" name="suma"><br>
     <label for="nume_agent">Nume agent:</label>
     <input type="text" name="nume_agent">
     <label for="numar_ap">Număr apartament:</label>
     <input type="text" name="numar_ap"><br>
     <label for="bloc">Bloc:</label>
     <input type="text" name="bloc">
     <label for="data">Data:</label>
     <input type="date" name="data"><br>
     <button type="submit" name="submit" onclick="mesaj()">Inregistreaza factură</button>
    </form>
</div>


</body>
<script>
  $(document).ready(function(){
   var $form = $('form');
   $form.submit(function(){
      $.post($(this).attr('action'), $(this).serialize(), function(response){
            
      },'json');
      return false;
   });
});
</script>


<script>

function mesaj(){
  swal({
  title: "Efectuat!",
  text: "Datele au fost inregistrate!",
  icon: "success",
  button: "Ok!",
});



setTimeout(function () { // wait 3 seconds and reload
    window.location.reload(true);
  }, 2000);

}


</script>
</html>