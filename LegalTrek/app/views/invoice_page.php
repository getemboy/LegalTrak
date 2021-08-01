<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device-width, initial=scale1.0">
        <link rel="stylesheet" href="<?=ASSETS?>css/style.css">
    </head>
    <body>
        <header>
        </header>
<h1 class='iv_header'>INVOICE</h1>
<div class='name_number'>
    <b class="name">Client Name: <?= $_SESSION['client']?></b>
    <b class="number">Invoice No: <?= $_SESSION['invoice_id']?></b>
</div>
<div class='matter_date'>
    <b class="matter">Matter: <?= $_SESSION['matter']?></b>
    <b class="date">Date: <?= $_SESSION['date']?></b>
</div>
<table class='table' style="width:100%" border = '1'>
  <tr>
    <th>Description</th>
    <th>Amount</th> 
    <th>Price</th>
    <th>Total</th>
  </tr>
  <tr>
    <td><?= $_SESSION['description']?></td>
    <td><?= $_SESSION['amount']?></td>
    <td><?= $_SESSION['price'] . ' ' . $_SESSION['currency']?></td>
    <td><?= $_SESSION['price'] . ' ' . $_SESSION['currency']?></td>
  </tr>
  
</table>

<b class="vat">VAT: <?= $_SESSION['price'] * ($_SESSION['vat'] / 100) . ' ' . $_SESSION['currency']?></b>
<br>
<b class="total">Total: <?= $_SESSION['total'] . ' '. $_SESSION['currency']?></b>
<b class='regards'> Kind regards, <br> <?= $_SESSION['issuer']?></b>

<?php
 
// Initialize class 
$word = new HTML_TO_DOC();
 
$htmlContent = '';
 
$word->createDoc($htmlContent ,$_SESSION['invoice_id'], 1);
    
?>


   </body>
