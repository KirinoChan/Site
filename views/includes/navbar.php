<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<link rel="stylesheet" href="/assets/css/style.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/1">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/todo/addtodo">Add new ToDo</a>
            </li>
            <?php
            if (!isset($_SESSION['on'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link login" id="login" href="#ex1" rel="modal:open">Login</a>
                </li>



            <?php
            }
            ?>
            <?php
            if ($_SESSION['on'] == 1) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/todo/logout">Logout</a>
                </li>

            <?php
            }
            ?>
        </ul>
    </div>


</nav>
    <div id="ex1" class="modal">
    <img id="loginSubmitGif" src="/assets/gif/done.gif" alt="">
  <form id="loginForm" class="navbar-form" method="POST">
    <p>Авторизация пользователя</p>
    <div class="form-row align-items-center">
      <div class="col-auto">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Login</div>
          </div>
          <input type="text" class="form-control" id="userLogin" placeholder="Jane Doe">
        </div>
      </div>
      <div class="col-auto">
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Password</div>
          </div>
          <input type="text" class="form-control" id="pass" placeholder="password">
        </div>
      </div>
      <div class="col-auto">
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="rememberMe" value="1">
          <label class="form-check-label" for="autoSizingCheck">
            Запомнить меня
          </label>
        </div>
      </div>
      <div class="col-auto">
        <button id="loginSubmit" type="submit" class="btn btn-primary mb-2">Войти</button>
      </div>
    </div>
    <label for="" id="loginDanger">Такого логина не существует</label>
    <label for="" id="passDanger">Пароль введен неверно</label>
    <div> <a href="#" rel="modal:close">Закрыть</a></div>

  </form>

</div>
