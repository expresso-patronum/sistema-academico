<!DOCTYPE html>
<html>
<head>
<title>Sistema Acadêmico</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
a{
  text-decoration: none;
  color: black;
}
.itens{
  background-color: white;
  width: 50%;
  margin: auto;
  margin-bottom: 5%;
  padding: 1%;
  display: flex;
  justify-content: center;
  align-items: center;
}


form{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
margin-top: 5%;
}

</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGw5VVoRLbRVQQAv8bGO-eTu9YbzdsSsYOMA&usqp=CAU" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Site Acadêmico</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="perfilProfessores" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PÁGINA DO PROFESSOR</a> 
    <a href="perfilAlunos" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>PÁGINA DO ALUNO</a> 
   </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

    <form action="{{ url('cadastrarDisciplina') }}" method="post">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome">

        <label for="ch">Carga Horária Semanal: </label>
        <input type="number" name="ch">

        <button type="submit">Cadastrar</button>

    </form>

    <!-- End page content -->
</div>
</div>

</body>
</html>