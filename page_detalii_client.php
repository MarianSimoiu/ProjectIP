<?php 

  include 'config.php';
  include 'platform.php';

  $cod_vanzare = $_GET['cod'];
  $nume = $_GET['nume'];
  $prenume = $_GET['prenume'];

  $sql = "SELECT cod_agent FROM vanzari WHERE cod_vanzare = '$cod_vanzare' ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $cod_agent = $row['cod_agent'];

  $sql2 = "SELECT nume_agent, prenume_agent FROM agenti_vanzari WHERE cod_agent = '$cod_agent' ";
  $result2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $nume_agent = $row2['nume_agent'];
  $prenume_agent = $row2['prenume_agent'];

  $sql3 = "SELECT cod_ap FROM vanzari WHERE cod_vanzare = '$cod_vanzare' ";
  $result3 = mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_assoc($result3);
  $cod_ap = $row3['cod_ap'];

  $sql4 = "SELECT * FROM apartamente WHERE cod_ap = '$cod_ap' ";
  $result4 = mysqli_query($conn,$sql4);
  $row4 = mysqli_fetch_assoc($result4);
  $nr_ap = $row4['numar_ap'];
  $bloc = $row4['cod_bloc'];
  $suma_totala = $row4['suma_ap'];

  switch ($bloc) {
    case "1":
      $cod_bloc = "A";
      break;
    case "2":
      $cod_bloc = "B";
      break;
    case "3":
      $cod_bloc = "C";
      break;
    case "4":
      $cod_bloc = "D";
    break;
    case "5":
       $cod_bloc = "E";
    break;
    case "6":
      $cod_bloc = "F";
    break;
  }

  $sql5 = "SELECT data_r FROM contracte_rezervare WHERE cod_vanzare = '$cod_vanzare' ";
  $result5 = mysqli_query($conn,$sql5);
  if(mysqli_num_rows($result5)>0){
  $row5 = mysqli_fetch_assoc($result5);
  $data_r = $row5['data_r'];
  $status_r = "semnat"; 
  $GLOBALS['status_r'] = $status_r;
  }
  else{
  $data_r = "-";
  $status_r = "nesemnat";
  $GLOBALS['status_r'] = $status_r;
  }

  $sql12 = "SELECT data_pspa FROM contracte_pspa WHERE cod_vanzare = '$cod_vanzare' ";
  $result12 = mysqli_query($conn,$sql12);
  if(mysqli_num_rows($result12)>0){
  $row12 = mysqli_fetch_assoc($result12);
  $data_pspa = $row12['data_pspa'];
  $status_pspa = "semnat"; 
  $_GLOBAL['status_pspa'] = $status_pspa;
  }
  else{
  $data_pspa = "-";
  $status_pspa = "nesemnat";
  $_GLOBAL['status_pspa'] = $status_pspa;
  }

  $sql13 = "SELECT * FROM contracte_vc WHERE cod_vanzare = '$cod_vanzare' ";
  $result13 = mysqli_query($conn,$sql13);
  if(mysqli_num_rows($result13)>0){
  $row13 = mysqli_fetch_assoc($result13);
  $data_vc = $row13['data_vc'];
  $status_vc = "semnat"; 

  }
  else{
  $data_vc = "-";
  $status_vc = "nesemnat";
  }

  $sql6 = "SELECT cod_client FROM vanzari WHERE cod_vanzare = '$cod_vanzare' ";
  $result6 = mysqli_query($conn,$sql6);
  $row6 = mysqli_fetch_assoc($result6);
  $cod_client = $row6['cod_client'];
   
  
  $f = array("-", "-", "-");

  $data_f = array("-","-","-");
  $i = 0;

  $sql7 = "SELECT * FROM facturi WHERE cod_client = '$cod_client' ";
  $result7 = mysqli_query($conn,$sql7);
  if (mysqli_num_rows($result7)>0){
	     while ($row7=mysqli_fetch_assoc($result7)){
        $f[$i] = $row7['nr_factura'];
        $data_f[$i] = $row7['data_factura'];
        $i = $i + 1;
       }
      }

  $plata_r = "-";
  $dif_r = "-";

  if ($f[0] != "-") {
  $plata_r = 5/100 * $suma_totala;
  $dif_r = $suma_totala- $plata_r;
  }
 
  $plata_pspa = "-";
  $dif_pspa = "-";

  if($f[1] != "-"){
  $plata_pspa = 10/100 * $suma_totala;
  $dif_pspa = $suma_totala- $plata_pspa;
        }
  

  $plata_vc = "-";
  $dif_vc = "-";

  $director = "-";
  if($f[2] != "-"){
  
  $plata_vc = 85/100 * $suma_totala;
  $dif_vc = $suma_totala - $plata_vc;
  
  }
  if($status_vc == "semnat")
  {
  $sql15 = "SELECT cod_director from contracte_vc WHERE cod_vanzare = '$cod_vanzare'";
  $result15 = mysqli_query($conn,$sql15);
  $row15 = mysqli_fetch_assoc($result15);
  $cod_director = $row15['cod_director'];
 
  $sql16 = "SELECT * from directori WHERE cod_director = '$cod_director'";
  $result16 = mysqli_query($conn,$sql16);
  $row16 = mysqli_fetch_assoc($result16);
  $nume_director = $row16['nume_director'];
  $prenume_director = $row16['prenume_director'];
  $director = $nume_director." ".$prenume_director;
  }

 if($plata_r != "-") {
  $sql8 = "SELECT * FROM plati_r WHERE nr_factura = '$f[0]' ";
  $result8 = mysqli_query($conn,$sql8);
  $row8 = mysqli_fetch_assoc($result8);
  $cod_plata_r = $row8['cod_plata_r'];
  
 }


 if($plata_pspa != "-") {
  $sql9 = "SELECT * FROM plati_pspa WHERE nr_factura = '$f[1]' ";
  $result9 = mysqli_query($conn,$sql9);
  $row9 = mysqli_fetch_assoc($result9);
  $cod_plata_pspa = $row9['cod_plata_pspa'];
 }

 

 if($plata_vc != "-") {
  $sql10 = "SELECT * FROM plati_vc WHERE nr_factura = '$f[2]' ";
  $result10 = mysqli_query($conn,$sql10);
  $row10 = mysqli_fetch_assoc($result10);
  $cod_plata_vc = $row10['cod_plata_vc'];
 }
 



 function afiseazaButon(){
   if($GLOBALS['status_r'] !='semnat')
  echo "<button id='btn-raport' onclick='Modifica()'>Modifica</button>";
 }
 ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<div class="row">
  
  <div class="column_1" >
    <h1>REZERVARE</h1><br>
    
    <h4 style="display:inline;" >Status contract: </h4> <h5> <?php echo " ",$status_r; ?> </h5>
    <?php afiseazaButon(); ?>
  <br><br>

  
    <h4 style="display:inline;" >Data semnării:</h4>
    
    <form  id="myDIV" class="form-data-contract_r" action="adauga_contract.php?cod=1" method="POST">
    <input type="date" name="data" style="display:inline;">
    <input type='hidden' name='plata_r' value='<?php echo "$cod_plata_r";?>'/>
    <input type='hidden' name='vanzare' value='<?php echo "$cod_vanzare";?>'/> 
    <input type='hidden' name='cod_ap' value='<?php echo "$cod_ap";?>'/>
    <button id="btn-raport_2" type="submit" name="submit" onclick="salveaza()">Salveaza</button>
    </form>
    
    <h5 id="linia" class="linie"> <?php echo " ",$data_r; ?> </h5>  


    <h2>Detalii client/Agent vânzări:</h2> <br>

    <h4>Nume client:</h4> <h5 class="of"><?php echo " ",$nume," ",$prenume; ?></h5><br><br>
    <h4>Nume agent vânzări: </h4> <h5><?php echo " ",$nume_agent," ",$prenume_agent; ?> </h5><br><br>

    <h2>Detalii apartament:</h2><br>
    <h4 class="ap">Număr apartament:</h4> <h5><?php echo " ",$nr_ap; ?> </h5><br><br>
    <h4 class="ap">Bloc: </h4> <h5 class="b"> <?php echo " ",$cod_bloc; ?></h5><br>

    <h2>Detalii plăți:</h2><br>
    <h4>Total de plată:</h4> <h5 class="sume"><?php echo " ",$suma_totala," $";?> </h5> <br><br>
    <h4>Sumă achitată:</h4>  <h5 class="sume"> <?php echo $plata_r; ?> </h5><br><br>
    <h4>Diferență de plată:</h4> <h5> <?php echo $dif_r; ?> </h5><br><br>
    <h4>Data încasării:</h4> <h5 class="data"> <?php echo $data_f[0]; ?></h5><br>   <br>
    
    
  </div>

  <div class="column_2" >
  <h1>PSPA</h1><br>
    
    <h4>Status contract: </h4> <h5> <?php echo " ",$status_pspa; ?> </h5>
    
    <button id="btn-raport2" onclick="Modifica2()">Modifica</button><br><br>

    <h4>Data semnării:</h4>  <h5 class="linie" id="linia2"> <?php echo " ",$data_pspa; ?> </h5>     

    <form  id="myDIV2" class="form-data-contract_r" action="adauga_contract.php?cod=2" method="POST">
    <input type="date" name="data" style="display:inline;">
    <input type='hidden' name='plata_pspa' value='<?php echo "$cod_plata_pspa";?>'/>
    <input type='hidden' name='vanzare' value='<?php echo "$cod_vanzare";?>'/> 
    <button id="btn-raport_2" type="submit" name="submit" onclick="salveaza2()">Salveaza</button>
    </form>

    <h2>Detalii plăți:</h2><br>
    <h4>Total de plată:</h4> <h5 class="sume"><?php echo " ",$suma_totala," $";?> </h5> <br><br>
    <h4>Sumă achitată:</h4>  <h5 class="sume"> <?php echo $plata_pspa; ?> </h5><br><br>
    <h4>Diferență de plată:</h4> <h5> <?php echo $dif_pspa; ?> </h5><br><br>
    <h4>Data încasării:</h4> <h5 class="data"> <?php echo $data_f[1]; ?> </h5><br>   <br>
   
    </div>

  <div class="column_3">
  <h1>VÂNZARE CUMPĂRARE</h1><br>
    
    <h4>Status contract: </h4> <h5> <?php echo " ",$status_vc; ?> </h5> 

    <button id="btn-raport3" onclick="Modifica3()">Modifica</button><br><br>

    <h4>Data semnării:</h4>  <h5 class="linie" id="linia3"> <?php echo " ",$data_vc; ?> </h5>  
    
    <form  id="myDIV3" class="form-data-contract_r" action="adauga_contract.php?cod=3" method="POST">
    <input type="date" name="data" style="display:inline;">
    <input type='hidden' name='plata_vc' value='<?php echo "$cod_plata_vc";?>'/>
    <input type='hidden' name='vanzare' value='<?php echo "$cod_vanzare";?>'/> 
    <input type='hidden' name='cod_ap' value='<?php echo "$cod_ap";?>'/>
    <button id="btn-raport_2" type="submit" name="submit" onclick="salveaza3()">Salveaza</button>
    </form>
    <br><br>   
    <h4>Director:</h4> <h5 class="linie" id="linie-dir"> <?php echo " ",$director; ?> </h5>
    <select class="select" id="dir" name="director" type="submit" style="display:none;" form="myDIV3">
      <option value="0">Director</option>
      <option value="1">Stelian Favieli</option>
      <option value="2">Roxana Gherghe</option>
    </select>
    
    <h2>Detalii plăți:</h2><br>
    <h4>Total de plată:</h4> <h5 class="sume"><?php echo " ",$suma_totala," $";?> </h5> <br><br>
    <h4>Sumă achitată:</h4>  <h5 class="sume"> <?php echo $plata_vc; ?>  </h5><br><br>
    <h4>Diferență de plată:</h4> <h5> <?php echo $dif_vc; ?> </h5><br><br>
    <h4>Data încasării:</h4> <h5 class="data"> <?php echo $data_f[2]; ?>  </h5><br>   <br>
   
  </div>
</div>
</body>
  
<script>
  $(document).ready(function(){
   var $form = $('form');
   $form.submit(function(){
      $.post($(this).attr('action'), $(this).serialize(), function(response){
            // do something here on success
           
      },'json');
      return false;
   });
});
</script>
 
<script>
function Modifica() {

  var x = document.getElementById("myDIV");  
  var btn = document.getElementById("btn-raport");  
  var linie = document.getElementById("linia");

  if (x.style.display == "none") {
    x.style.display = "inline";
    btn.innerHTML= "Anuleaza";
  } else {
    x.style.display = "none";
    btn.innerHTML= "Modifica";
  }

  if ( btn.innerHTML == "Anuleaza")
    linie.style.display = "none";
    else
    linie.style.display = "inline";
  
}

function Modifica2() {
  
  var x = document.getElementById("myDIV2");  
  var btn = document.getElementById("btn-raport2");  
  var linie = document.getElementById("linia2");

  if (x.style.display == "none") {
    x.style.display = "inline";
    btn.innerHTML= "Anuleaza";
  } else {
    x.style.display = "none";
    btn.innerHTML= "Modifica";
  }

  if ( btn.innerHTML == "Anuleaza")
    linie.style.display = "none";
    else
    linie.style.display = "inline";
  
}

function Modifica3() {
  
  var x = document.getElementById("myDIV3");  
  var btn = document.getElementById("btn-raport3");  
  var linie = document.getElementById("linia3");
  var director = document.getElementById("dir");
  var linia = document.getElementById("linie-dir");

  if (x.style.display == "none") {
    x.style.display = "inline";
    btn.innerHTML= "Anuleaza";
    director.style.display = "inline";
  } else {
    x.style.display = "none";
    btn.innerHTML= "Modifica";
    director.style.display = "none";
  }


  if ( btn.innerHTML == "Anuleaza")
    {linie.style.display = "none";
    linia.style.display = "none";}
    else{
    linie.style.display = "inline";
    linia.style.display ="inline";
    }
}
</script>
<script>
function salveaza() {
  window.location.reload(true);
   return false;
   var x = document.getElementById("myDIV");
   x.style.display = "none";
   var x = document.getElementById("linia");
   x.style.display = "inline";
  
}

function salveaza2() {
window.location.reload(true);
return false;
var x = document.getElementById("myDIV2");
x.style.display = "none";
var x = document.getElementById("linia2");
x.style.display = "inline";

}

function salveaza3() {

var x = document.getElementById("myDIV3");
x.style.display = "none";
var x = document.getElementById("linia3");
x.style.display = "inline";

window.location.reload(true);
return false;
}
</script>

<script>

function mesaj(){
  swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});

}
</script>

</html>