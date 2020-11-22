<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="/assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Все записи</title>
</head>

<?php include_once(ROOT . "/views/includes/navbar.php"); ?>

<body>
  <div class="container mt-5">
    <h3>Сортировать по</h3>
    <form id="formSort" class="form-sort mt-5 mb-5" method="POST">
      <div class="form-group">
        <select id="sortType" name="sortType" class="form-control form-control-lg">
          <option value="name">Имени пользователя</option>
          <option value="email">E-mail</option>
          <option value="status">Статусу</option>
          <option value="id">ID</option>
          <option value="nameDesc">Имени пользователя по убыванию</option>
          <option value="emailDesc">Emaill по убыванию</option>
          <option value="statusDesc">Статусу по убыванию</option>
        </select>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-success form-control" value="Сортировать">
      </div>

    </form>

    <?php foreach ($toDoList as $toDoItem) {  ?>
      <form id="todoForm" class="jumbotron">
        <div class="form-group">
          <input type="text" id="<?php echo $toDoItem['id']; ?>" class="editTitle todoInput display-4" id="editTitle" name="<?php echo $toDoItem['id']; ?>" value="<?php echo $toDoItem['title']; ?>" disabled></input>
        </div>

        <div class="form-group">
          <input type="text" id="<?php echo $toDoItem['id']; ?>" class="editEmail todoInput lead" id="editEmail" name="<?php echo $toDoItem['id']; ?>" value="<?php echo $toDoItem['email']; ?>" disabled></input>
        </div>
        <div class="form-group">
          <input type="text" id="<?php echo $toDoItem['id']; ?>" class="editName todoInput lead" id="editName" name="<?php echo $toDoItem['id']; ?>" value="<?php echo $toDoItem['name']; ?>" disabled></input>
        </div>
        <hr class="my-4">
        <div class="form-group">
          <textarea type="text" id="<?php echo $toDoItem['id']; ?>" class="editText todoInput form-control" name="<?php echo $toDoItem['id']; ?>" disabled><?php echo $toDoItem['text']; ?></textarea>
        </div>

        <div class="editCheckGroup form-group hidden" id="<?php echo $toDoItem['id']; ?>">
          <label for="">Выполнено</label>
          <input id="<?php echo $toDoItem['id']; ?>" class="editCheck" type="checkbox">
        </div>

        <div class="form-admin">
          <div class="form-group">
            <?php if (isset($_SESSION['on'])) { ?>
              <input type="submit" name="<?php echo $toDoItem['id']; ?>" value="Редактировать" class="inputToDoEdit btn btn-primary btn-lg" href="#" role="button"></input>
              <input id="<?php echo $toDoItem['id']; ?>" type="submit" name="<?php echo $toDoItem['id']; ?>" class="inputTodoSuccess btn btn-success hidden" value="Редактировать">
            <?php } ?>
            <?php if ($toDoItem['edited_by_admin'] == 1) { ?>
              <input type="text" class="btn btn-warning" value="Edited by admin">
            <?php } ?>
            <?php if ($toDoItem['is_done'] == 1) { ?>
              <input type="text" class="btn btn-success" value="DONE">
            <?php } ?>
          </div>
        </div>
      </form>
    <?php }

    ?>



    <div class="d-flex justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php
          $page = $toDoList[0]['page'];
          $total = $toDoList[0]['total'];
          if ($page != 1) { ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li>
          <?php } ?>
          <?php if ($page != $total) { ?>
            <li class="page-item"><a class="page-link" href="<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li>
            <li class="page-item">
              <a class="page-link" href="<?php echo $total ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>

          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="/assets/js/script.js"></script>

</html>
