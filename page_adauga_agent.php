<?php 
include 'platform.php';

?>


<div class="agent-form">
    <div class="date_agent">
    <p>Introduceți datele agentului:</p>
    </div>
    <form action="adauga_agent.php" method="POST">
     <label for="nume_agent">Nume agent:</label>
     <input type="text" name="nume_agent" required>
     <label for="prenume_agent">Prenume agent:</label>
     <input type="text" name="prenume_agent"><br>

     <label for="telefon_agent">Telefon:</label>
     <input type="text" name="telefon_agent">
     <label for="email_agent">Email:</label>
     <input type="text" name="email_agent"><br>

     <button type="submit" name="submit" onclick="mesaj()">Înregistrează agent</button>
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