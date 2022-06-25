<?php 
include 'platform.php';
?>
<style>
select#tip {
  width: 150px;
  padding: 5px 35px 5px 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: url("images/appartment.png") 96% / 15% no-repeat #eee;
  border-radius: 4px;
  cursor: pointer;
}
select#status {
  width: 150px;
  padding: 5px 35px 5px 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: url("images/appartment.png") 96% / 15% no-repeat #eee;
  border-radius: 4px;
  cursor: pointer;
}
input{
    border-radius: 3px;
}
</style>
<body>
<div class="select-wrapper_ap" >
    <h1> Selectati date apartament: </h1> <br>
    <h2 id="h2_an"> Selectati tip/status apartament:</h2>
    <select class="select" id="tip" name="tip" type="submit">
        <option value="0">Tip</option>
        <option value="dublu">dublu</option>
        <option value="triplu">triplu</option>
        <option value="studio">studio</option>
    </select>
    <select  class="select" id="status" name="status" onchange="arata_data(this)">

        <option>Status</option>
        <option value="disponibil">disponibil</option>
        <option value="vandut">vandut</option>
        <option value="rezervat">rezervat</option>
        </select>
        <br><br>

    <h2 id="h2_an"> Selectati interval suma apartament (euro):</h2> 
    <input type="number" id="valoare_in" name="valoare_in">
    <input type="number" id="valoare_sf" name="valoare_sf">
        <br><br>
    <h2 id="h2_an"> Selectati interval suprafata apartament (m2):</h2> 

    <input type="number" id="suprafata_in" name="suprafata_in">
    <input type="number" id="suprafata_sf" name="suprafata_sf">
    
    <br><br>
    <button id="btn-raport_ap" name="btn" onclick="arataRaport()">Creaza raport</button>
   
    
</div>


<div id="alege_data" style="display:none;" >
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
     <br><br>
        <h2 id="h2_an"> Pana in  anul/luna:</h2>
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
        
</div>

<p><button onclick="sortTable()">Sort</button></p>
<div class="table-wrapper" id="tab">
    <table class="fl-table" id="tabela" >
		<thead>
			<tr>
				<th>Nr.crt</th>
				<th>Numar ap</th>
                <th>Bloc</th>
                <th>Etaj</th>
                <th>Pret</th>
			
			</tr>
		</thead>
        <tbody id="continut_tabel">
          
        </tbody>
    </table>
</div>



<script>
function arata_data(select){
   if(select.value=="vandut"){
    document.getElementById('alege_data').style.display = "block";
   } else{
    document.getElementById('alege_data').style.display = "none";
   }
} 
</script>
</body>
<script>

function ascunde(){

var x = document.getElementById("sd");

if(x.style.display != "none")
    x.style.display = "none";
else
x.style.display = "block";

}

var x = document.getElementById("status");
var status = x.options[x.selectedIndex].value;
document.getElementById("demo").innerHTML = status;
if( status == "vandut")
  ascunde();

</script>



<script>

function arataRaport() {

var x = document.getElementById("tab");
    
  if (x.style.display === "none") 
    x.style.display = "block";
    else
    x.style.display = "none";

var x = document.getElementById("tip");
    var tip = x.options[x.selectedIndex].value;

var x = document.getElementById("status");
    var status = x.options[x.selectedIndex].value;

var pret_in = document.getElementById("valoare_in").value;

var pret_sf = document.getElementById("valoare_sf").value;

var sup_in = document.getElementById("suprafata_in").value;

var sup_sf = document.getElementById("suprafata_sf").value;


var an = document.getElementById("an_in");
    var an_in = an.options[an.selectedIndex].value;

var an = document.getElementById("an_sf");
    var an_sf = an.options[an.selectedIndex].value;
   
var luna = document.getElementById("luna_in");
    var luna_in = luna.options[luna.selectedIndex].value;
   
var luna = document.getElementById("luna_sf");
    var luna_sf = luna.options[luna.selectedIndex].value;


  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("continut_tabel").innerHTML = this.responseText;
  }
  xhttp.open("GET", "afiseaza_raport_ap.php?tip=" + tip + "&status=" + status + "&pi=" + pret_in + "&ps=" + pret_sf + "&si=" +
   sup_in + "&ss=" + sup_sf + "&ai=" + an_in + "&as=" + an_sf + "&li=" + luna_in + "&ls=" + luna_sf, true);
  xhttp.send();
  

}
</script>

<script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

</html>