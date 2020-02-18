<!DOCTYPE html>
<html lang="es">
    <?php require 'views/head.php'; ?>
<body>
    <?php require 'views/header.php'; ?>

    <main class="container mt-1">
        <div class="card-group">

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">Título encabezado</div>
                    <div class="card-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="search" class="form-control" placeholder="Enter email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>                
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">Título encabezado</div>
                    <div class="card-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </main>

    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    <?php require 'views/footer.php'; ?>

</body>
</html>



