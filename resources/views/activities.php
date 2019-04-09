<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/basicCRUD/public/css/bootstrap.min.css">

    <title>Módulos</title>
  </head>
  <body>
    <div class="container">
      <div class="row align-items-center">
        <div class="col"><h1>Atividades</h1></div>
        <div class="col">
          <div class="text-right">
              <a href="/basicCRUD"><input type="button" value="Voltar" class="btn btn-default" /></a>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Título</th>
                <th class="text-center">Descrição</th>
                <th class="text-center">Data de cadastro</th>
                <th class="text-center">Data de alteração</th>
                <th class="text-center">Status</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
          <?php if(isset($activities[0][id])) {
            foreach($activities as $activity) { ?>
              <tr>
                <td><?php echo $activity['title']; ?></td>
                <td><?php echo $activity['description']; ?></td>
                <td><?php echo $activity['created_at'] == null ? '' : date("d/m/Y H:i:s", strtotime($activity['created_at'])); ?></td>
                <td><?php echo $activity['updated_at'] == null ? '' : date("d/m/Y H:i:s", strtotime($activity['updated_at'])); ?></td>
                <td><?php echo $activity['status']; ?></td>
                <td>
                  <a href="/basicCRUD/activities/edit/<?php echo $activity['id'] ?>"><button class="btn btn-primary">Editar</button></a>
                  <a href="/basicCRUD/activities/delete/<?php echo $activity['id'] ?>"><button class="btn btn-danger">Apagar</button></a>
                </td>
              </tr>
            <?php }
          } ?>
          <form class="form-horizontal" action="/basicCRUD/activities/record" method="POST" role="form">
            <tr class="bg-info">
              <input type="hidden" name="module_id" value="<?php echo $activities[0]['module_id'] ?>">
              <td><input type="text"  name="title" class="form-control" id="title" placeholder="Título" required></td>
              <td colspan="2"><input type="text" name="description" class="form-control" id="description" placeholder="Descrição" required></td>
              <td colspan="2">
                <div class="col-auto my-1">
                    <select class="custom-select mr-sm-2" name="status" id="inlineFormCustomSelect">
                        <option selected>Status</option>
                        <option value="1">Status 1</option>
                        <option value="2">Status 2</option>
                        <option value="3">Status 3</option>
                    </select>
                </div>
              </td>
              <td><input type="submit" value="Adicionar atividade" class="btn btn-default"></td>
            </tr>
          </form>
        </tbody>
    </table>
  </body>
</html>
