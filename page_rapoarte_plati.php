<?php 
include 'platform.php';
?>


<div class="select-wrapper_vanzari">
<h1> Selectati perioada raportului de plati: </h1> <br>
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
				<th>Nume client</th>
				<th>Prenume client</th>
                <th>Plata rezervare</th>
                <th>Data plata rezervare</th>
                <th>Plata pspa</th>
                <th>Data plata pspa</th>
                <th>Plata vanzare</th>
                <th>Data plata vanzare</th>
                
			</tr>
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



  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("continut_tabel").innerHTML = this.responseText;
  }
  xhttp.open("GET", "afiseaza_raport_plati.php?ai=" + an_in + "&as=" + an_sf + "&li=" + luna_in + "&ls=" + luna_sf, true);
  xhttp.send();
  

}
</script>

</html>