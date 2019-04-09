<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/basicCRUD/public/css/bootstrap.min.css">

    <title>Editar</title>
  </head>
  <body>
    <div class="container col-md-4 col-md-offset-2">
      <h1>Editar <?php echo $edit['name']; ?></h1>
      <form class="form-horizontal" action="/basicCRUD/<?php echo $edit['controller']; ?>/update" method="POST" role="form">
        <fieldset>
          <input type="hidden" name="id" value="<?php echo $edit['data']['id'] ?>">
          <?php if(isset($edit['data']['module_id'])) { ?> 
            <input type="hidden" name="module_id" value="<?php echo $edit['data']['module_id'] ?>">
          <?php } ?>
          <div class="form-group">
            <label for="title" class="control-label">Título</label>
            <div class="controls">
              <input type="text" name="title" value="<?php echo $edit['data']['title'] ?>" class="form-control" id="title">
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="control-label">Descrição</label>
            <div class="controls">
              <input type="text" name="description" value="<?php echo $edit['data']['description'] ?>" class="form-control" id="description">
            </div>
          </div>
          <div class="form-group">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
                <select class="custom-select mr-sm-2" name="status" id="inlineFormCustomSelect">
                  <option value="1" <?php echo $edit['data']['status'] == 1 ? 'selected' : '' ?>>Status 1</option>
                  <option value="2" <?php echo $edit['data']['status'] == 2 ? 'selected' : '' ?>>Status 2</option>
                  <option value="3" <?php echo $edit['data']['status'] == 3 ? 'selected' : '' ?>>Status 3</option>
                </select>
              </div>
            </div>
          <div class="control-group">
            <div class="controls">
              <input type="submit" value='Alterar' class="btn btn-default">
              <a href="/basicCRUD"><input type="button" value='Voltar' class="btn btn-default"></a>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>
