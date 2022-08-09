<?php

$resultado = "Não há Dados";

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
   <meta name="generator" content="Hugo 0.101.0">
   <title>Consulta CEP (ViaCEP)</title>

   <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-static/">
   <link rel="stylesheet" media="all" href="assets/dist/css/bootstrap.min.css">

<body>

   <?php         
             
             if ( isset($_POST['btnOperacao']) ) {
                                    
                  $data = "";                     
                  $cep  = str_replace('-','',$_POST['cepcode']);                                    
                  $ch   = curl_init();

                  curl_setopt($ch, CURLOPT_URL, 'https://viacep.com.br/ws/'.$cep.'/json/');
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $data = Json_Decode(curl_exec($ch));                  

                  curl_close($ch);
                  
             }
              
         ?>

   <br><br>
   <main class="container">
      <div class="bg-light p-5 rounded">
         <h1>Consulta CEP (ViaCep)</h1>
         <p class="lead">Exemplo de consumo API em PHP com exibição no Bootstrap</p>

         <!-- Informa o CEP -->
         <form method="post">
            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Qual CEP deseja consultar?</label>
               <input type="tezt" class="form-control" name="cepcode" placeholder="00000-000">
            </div>
            <button type="submit" class="btn btn-primary" name="btnOperacao">Consultar &raquo;</button>
         </form>
         <br>
         <?php 
   If (!Empty($data)){ 
      echo '<table class="table table-primary table-striped">';
      echo'<tr>';
      echo   '<td class="table-primary">Cep</td>';
      echo   '<td class="table-primary">Logradouro</td>';
      echo   '<td class="table-primary">Complemento</td>';
      echo   '<td class="table-primary">Bairro</td>';
      echo   '<td class="table-primary">Cidade</td>';
      echo   '<td class="table-primary">Estado</td>';
      echo   '<td class="table-primary">DDD</td>';
      echo   '<td class="table-primary">IBGE</td>';
      echo   '<td class="table-primary">GIA</td>';       
      echo   '<td class="table-primary">SIAFI</td>';
      echo'</tr>';
      echo   '<tr>';
      echo      '<td>'.$data->{'cep'}.'</td>';
      echo      '<td>'.$data->{'logradouro'}.'</td>';
      echo      '<td>'.$data->{'complemento'}.'</td>';
      echo      '<td>'.$data->{'bairro'}.'</td>';
      echo      '<td>'.$data->{'localidade'}.'</td>';
      echo      '<td>'.$data->{'uf'}.'</td>';
      echo      '<td>'.$data->{'ibge'}.'</td>';
      echo      '<td>'.$data->{'gia'}.'</td>';
      echo      '<td>'.$data->{'ddd'}.'</td>';
      echo      '<td>'.$data->{'siafi'}.'</td>';
      echo   '</tr>';   
      echo'</table>';
   }else{
      echo "<h3>".$resultado."</h3>";
   }?>

      </div>
   </main>
   <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>