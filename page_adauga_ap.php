<?php 
include 'platform.php';

$cod=$_GET['cod'];

?>

<div class="app-form">
  <div class="date_ap">
    <p>Introduceți datele apartamentului:</p>
  </div>
    <form action="adauga_ap.php?cod=<?php echo $cod; ?>" method="POST">
    <div class="lab-inp">
     <label for="numar">Număr:</label>
     <input type="text" name="numar_ap">
     <label for="etaj">Etaj:</label>
     <input type="text" name="etaj_ap"><br>
     <label for="suma">Suma:</label>
     <input type="text" name="suma_ap">
     <label for="tip">Tip:</label>
     <input type="text" name="tip_ap"><br>
     <label for="suprafata">Suprafața:</label>
     <input type="text" name="suprafata_ap"> 
     <label for="status">Status:</label>
     <input type="text" name="status_ap"><br>
     <button type="submit" name="submit" value="submit" onclick="mesaj()">Inregistrează apartament</button>
     </div>
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
