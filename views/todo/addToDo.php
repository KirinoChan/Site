<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a todo</title>
</head>
<?php include_once(ROOT . "/views/includes/navbar.php"); ?>

<body>
    <div class="container mt-5">
        <img class="successAdd hidden" src="/Assets/gif/done.gif" alt="">
        <form id="addTodoForm" method="POST">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="addTodoName">Name</label>
                    <input type="text" class="form-control" id="addTodoName" value="Mark" required>
                    <div class="invalid-feedback">Uncorrect name</div>
                </div>

        
            </div>
            <div class="form-row">
            <div class="col-md-6 mb-3">
                    <label for="addTodoTitle">Title</label>
                    <input type="text" class="form-control" id="addTodoTitle" value="Otto" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
     
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="addTodoEmail">Email</label>
                    <input type="text" class="form-control" id="addTodoEmail" value="Otto" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Пожалуйста, проверьте, корректно ли Вы ввели e-mail адрес.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer03">Text of todo</label>
                    <textarea type="text" class="form-control" id="addTodoText" aria-describedby="validationServer03Feedback" required></textarea>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Пожалуйста введте правильно текст записи.
                    </div>

                    <div id="validationServer03Feedback" class="valid-feedback">
                        Все правильно!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="/assets/js/script.js"></script>
</body>

</html>
