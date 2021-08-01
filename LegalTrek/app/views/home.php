<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device-width, initial=scale1.0">
        <link rel="stylesheet" href="<?=ASSETS?>css/style.css">
    </head>
    <body>
        <header>
        </header>
            <form class='grid' method='post'>
              <div>
              <label class='labels'>Client:</label>
                    <input type='text' name="client" class='content' list="clients" !importent>
                    <datalist id="clients">
                      <option value="Client A">
                      <option value="Client B">
                      <option value="Client C">
                    </datalist>
                </input>
              </div>
                <div>
                <label class='labels'>Matter:</label>
                    <input id="matter" class='content' list="matters" name="matter">
                    <datalist id="matters">
                        <option value="matter A">
                        <option value="matter B">                         
                        <option value="matter C">
                        </datalist>
                    </input>
                  </div>
                  <div>
                  <label class='labels'>Client name:</label>
                  <b id="showClient" class="content"></b>
                  <script>


var getvalue=document.getElementsByName('client')[0];
getvalue.addEventListener('input', function(){
    document.getElementById("showClient").innerHTML = this.value;
});
</script>

                <div>
                  <label class='labels'>Matter name:</label>
                  <b id="showMatter" class="content"></b>
                </div>

                <script>
var getvalue2=document.getElementsByName('matter')[0];
getvalue2.addEventListener('input', function(){
    document.getElementById("showMatter").innerHTML = this.value;
});


</script>
                <label class='labels'>Issuer:</label>
                    <select class='content'  name="issuer" id="issuer">
                        <option value="Atanas Mihnev">Atanas Mihnev</option>
                        <option value="Elvis Metodiev">Elvis Metodiev</option>
                        <option value="Dimitar Naydenov">Dimitar Naydenov</option>
                    </select>
                  </div>
                      <div>
                        <label class='labels'>Currency:</label>
                      <select class='content'  id="currency" name="currency" onchange="myFunction()">
                        <option value="€" selected>Euro</option>
                        <option value="$" >US dollars</option>
                      </select>
                      
                          <script type="text/javascript">
window.onload = function() {
    document.getElementById("currency").onchange();
};

                      </script>
                    </div>

                    <script>
                        



                        function myFunction() {
        var x = document.getElementById("currency").value;
document.getElementById("showCurrency1").innerHTML = x;
document.getElementById("showCurrency2").innerHTML = x;
document.getElementById("showCurrency3").innerHTML = x;




}
                    </script>
                    <div>
                      <label class='labels'>Invoice No</label>
                      <input class='content'  type='number' name='InvoiceNo' id='InvoiceNo' onchange="invNo()">
                      <b id="InvoiceDate" class='InvoiceDate'></b>
                                        </div>
                    <div>
                      <label class='labels'>Issuing date:</label>
                        <input class='content'  type="date" name='date' id='date'>
                      
                    </div>
                    <div>
                      <label class='labels'>Description:</label>
                      <input class='content'  type='text' name='description' id='description'>


                    <div>
                      <label class='labels'>Price:</label>
                      <b id="showCurrency1" class='labels' ></b><input class='content'  type='number' step="0.01" name='price' id='price' value="0.00" min=1.00 max=1000000 onchange="getVat()"> <b id="showCurrency" class='ammount' ></b>
                    </div>
                    
                    <div>
                      

                    
                    
                      <input type='checkbox' name='discount_check' id='discount_check' > 
                      <label class='labels'>Discount: </label>
                      <input class='content'  type='number' step="0.01" name='discount_proc' id='discount_proc' value="0.00" onchange="getVat()" disabled><b class='pro'>
                          % </b> <b id="showCurrency2" class='ammount' ></b>
                          <b id="showDisc" class='showVAT' ></b>
                    
                    </div>

                    <div>
                      
                      <input type='checkbox' name='vat_check' id='vat_check' checked='checked'> <label class='labels'>VAT: </label>
                      <input class='content'  type='number' name='vat_proc' id='vat_proc' value="20" min ='20' max='20'> <b class='pro'>% </b> <b id="showCurrency3" class='ammount' ></b> <b id="showVAT" class='showVAT' ></b>
                    
                    </div>
                    <script>
(function(){
var discount_check = document.getElementById('discount_check');
var discount_proc = document.getElementById('discount_proc');
var vat_check = document.getElementById('vat_check');
var vat_proc = document.getElementById('vat_proc');

discount_check.addEventListener('click', function(){
  if(this.checked){
    discount_proc.disabled= '';
  }
  else {
    discount_proc.disabled= 'false';
    document.getElementById('discount_proc').value = 0;
  }
});

vat_check.addEventListener('click', function(){
  if(this.checked){
    vat_proc.disabled= '';
    vat_proc.value = 20;
  }
  else {
    vat_proc.disabled= 'false';
    vat_proc.value = 0;
  }
});

})();




                    function getVat() {
                      var y = document.getElementById('price').value;
                      var m = document.getElementById('discount_proc').value;
m = (m / 100) * y;
m = Math.round(m * 100) / 100
document.getElementById("showDisc").innerHTML = m;  




        
        n = (y-m) * 0.20;
        n = Math.round(n * 100) / 100
        document.getElementById("showVAT").innerHTML = n;

 
};

function invNo() {
var number = document.getElementById('InvoiceNo').value;
document.getElementById("InvoiceDate").innerHTML = number + '/2020'; 

};
                    </script>
                    <div>
                        <input type='submit' name='submit' id="submit"> </input>
                        <input type='reset' name='test' id="reset"> </input>
</div>
            </form>




    </body>




</html>