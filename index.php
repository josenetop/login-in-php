<?php
include 'verificaLogin.php';
function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['emailUser']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="container">

<?php

$usuario = new Usuarios();

if(isset($_POST['cadastrar'])):

  $nome  = $_POST['nome'];
  $email = $_POST['email'];

  $usuario->setNome($nome);
  $usuario->setEmail($email);

  # Insert
  if($usuario->insert()){
    echo "Inserido com sucesso!";
  }

endif;

?>


<?php 
if(isset($_POST['atualizar'])):

  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $usuario->setNome($nome);
  $usuario->setEmail($email);

  if($usuario->update($id)){
    echo "Atualizado com sucesso!";
  }

endif;
?>

<?php
if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

  $id = (int)$_GET['id'];
  if($usuario->delete($id)){
    echo "Deletado com sucesso!";
  }

endif;
?>

<?php
if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

  $id = (int)$_GET['id'];
  $resultado = $usuario->find($id);
?>

<form method="post" action="">
  <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
  </div>
  <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
    <input type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
  </div>
  <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
  <br />
  <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
</form>

<?php }else{ ?>


<form method="post" action="">
  <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input type="text" name="nome" placeholder="Nome:" />
  </div>
  <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
    <input type="text" name="email" placeholder="E-mail:" />
  </div>
  <br />
  <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
</form>

<?php } ?>

<table class="table table-hover">
  
  <thead>
    <tr>
      <th>#</th>
      <th>Nome:</th>
      <th>E-mail:</th>
      <th>Ações:</th>
    </tr>
  </thead>
  
  <?php foreach($usuario->findAll() as $key => $value): ?>

  <tbody>
    <tr>
      <td><?php echo $value->id; ?></td>
      <td><?php echo $value->nome; ?></td>
      <td><?php echo $value->email; ?></td>
      <td>
        <?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
        <?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
      </td>
    </tr>
  </tbody>

  <?php endforeach; ?>

</table>

</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
