<?php 

include 'platform.php';
?>


<div class="client-form">
  <div class="date_client">
    <p>Introduceți datele clientului și ale vânzării:</p>
  </div>
    <form action="adauga_client.php" method="POST">
     <label for="nume">Nume:</label>
     <input type="text" name="nume">
     <label for="CNP">CNP:</label>
     <input type="text" name="CNP"><br>
     <label for="prenume">Prenume:</label>
     <input type="text" name="prenume">
     <label for="data_nasterii" >Data nașterii:</label>
     <input type="date" name="data_nasterii"><br>
     
     <label for="adresa">Adresă:</label>
     <input type="text" name="adresa">
     <label for="telefon">Telefon:</label>
     <input type="text" name="telefon"><br>
     <label for="email">Email:</label>
     <input type="text" name="email">

     <div class="detalii_vanzare">
     <p>Detalii vânzare</p>
   
     <label for="numar_apartament">Număr apartament<label>
     <input type="text" name="numar_apartament"><br>
    
     <label for="bloc_vanzare">Bloc:</label>
     <input type="text" name="bloc_vanzare"><br>
     
     <label for="nume_agent">Nume agent vânzări:</label>
     <input type="text" name="nume_agent"><br>     
     
    </div>
    
     <button type="submit" name="submit" onclick="mesaj()">Inregistrează</button>
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
