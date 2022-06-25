<?php 
include 'platform.php';

function select_ag(){
include 'config.php';
$sql = "SELECT * FROM agenti_vanzari";
$result = mysqli_query($conn,$sql);
echo '<select id="agent" class="select" id="agent" name = "agent" type ="submit">';
echo '<option value="0">Nume agent</option>';
if(mysqli_num_rows($result)>0)
while ($row=mysqli_fetch_assoc($result)) {
  $name = $row['nume_agent']." ".$row['prenume_agent'];
 echo "<option value={$row['cod_agent']}>{$name}</option>";

}
echo '</select>';
}
?>
<style>
h2 {
    display: inline;
}
select#agent {
  width: 150px;
  padding: 5px 35px 5px 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: url("images/man-user.png") 96% / 15% no-repeat #eee;
  border-radius: 4px;
  cursor: pointer;
}
.select-wrapper_agent {
    margin: 50px 350px;
  background-color: rgba(252, 243, 243, 0.815);
  width: 50%;
  border-radius: 10px;
  height: 230px;
  border-style: inset;
  border-width: 2px;
  border-color: rgb(83, 93, 99);
}
.select-wrapper_agent h1 {
    font-size: 25px;
  font-family: "Times New Roman", Times, serif;
  padding: 10px;
}

.select-wrapper_agent h2 {
    font-size: 19px;
  font-family: "Times New Roman", Times, serif;
  padding: 10px;
}
</style>

<div class="select-wrapper_agent">
<h1> Selectati perioada de activitate si agentul: </h1> <br>
<h2 >Nume agent:</h2><?php select_ag();?> <br><br>
<h2 id="h2_an"> Din anul/luna:</h2>
<select class="select" id="an_in" name="an_in" type="submit">
    <option value="0">An inceput</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
</select>



<select  class="select" id="luna_in" name="luna_in">
    <option>Luna inceput</option>
    <option value="01">Ianuarie</option>
    <option value="02">Februarie</option>
    <option value="03">Martie</option>
    <option value="04">Aprile</option>
    <option value="05">Mai</option>
    <option value="06">Iunie</option>
    <option value="07">Iulie</option>
    <option value="08">August</option>
    <option value="09">Septembrie</option>
    <option value="10">Octombrie</option>
    <option value="11">Noiembrie</option>
    <option value="12">Decembrie</option>
</select>

<br> <br>
<h2 id="h2_an_2"> Pana in  anul/luna:</h2>
<select id="an_sf" name="an_sf">
    <option>An final</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
</select>

<select id="luna_sf" name="luna_sf">
    <option>Luna final</option>
    <option value="01">Ianuarie</option>
    <option value="02">Februarie</option>
    <option value="03">Martie</option>
    <option value="04">Aprile</option>
    <option value="05">Mai</option>
    <option value="06">Iunie</option>
    <option value="07">Iulie</option>
    <option value="08">August</option>
    <option value="09">Septembrie</option>
    <option value="10">Octombrie</option>
    <option value="11">Noiembrie</option>
    <option value="12">Decembrie</option>
</select>
<body>

<button id="btn-raport" name="btn" onclick="arataRaport()">Creaza raport</button> <br>
</div>



<div class="table-wrapper" id="tab">

<table class="fl-table"  >
		<thead>
			<tr>
				<th>Nr.crt</th>
				<th>Total contracte vanzare</th>
				<th>Suma total ap vandute</th>
        <th>Suma totala comision</th>
                
		</thead>
        <tbody id="continut_tabel">
          
        </tbody>
</table>
</div>
</body>


<script>

function arataRaport() {

var x = document.getElementById("tab");
  if (x.style.display === "none") 
    x.style.display = "block";
    else
    x.style.display = "none";

var an = document.getElementById("an_in");
    var an_in = an.options[an.selectedIndex].value;

var an = document.getElementById("an_sf");
    var an_sf = an.options[an.selectedIndex].value;
   
var luna = document.getElementById("luna_in");
    var luna_in = luna.options[luna.selectedIndex].value;
   
var luna = document.getElementById("luna_sf");
    var luna_sf = luna.options[luna.selectedIndex].value;

var cod = document.getElementById("agent");
    var cod_agent = cod.options[cod.selectedIndex].value;


  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("continut_tabel").innerHTML = this.responseText;
  }
  xhttp.open("GET", "afiseaza_raport_agent.php?ai=" + an_in + "&as=" + an_sf + "&li=" + luna_in + "&ls=" + luna_sf,"&cod=1", true);
  xhttp.send();
  

}
</script>

</html>