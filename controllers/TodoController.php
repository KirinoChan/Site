<?php
include_once ROOT . '/models/ToDo.php';
class TodoController
{
    public function actionIndex($page)
    {
        session_start();
        $todoList = array();
        $toDoList = ToDo::getToDoList($page);
        require_once(ROOT . '/views/todo/index.php');
        return true;
    }

    public function actionAddtodo()
    {
        session_start();
            require_once(ROOT . '/views/todo/addToDo.php');
            return true;
        
    }

    public function actionLogin() {
        session_start();
        $login = htmlspecialchars($_POST['login']);
        $pass = htmlspecialchars($_POST['pass']);
        Todo::login($login,$pass);
        return true;
    }

    public function actionlogout() {
        session_start();
        unset($_SESSION['on']);
        session_unset();
        session_destroy();
        header('Location:/1');
    }

    public function actionVerifytodo()
    {   
        session_start();
     
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $title = htmlspecialchars($_POST['title']);
            $text = htmlspecialchars($_POST['text']);
            ToDo::verifyTodo($name,$email,$title,$text);
            return true;
  
    }

    public function actionSetsort() {
         session_start();
         $sortType = $_POST['sortType'];
         $_SESSION['sortType'] = $sortType;
         return true;
    }

    public function actionEdit() {
        session_start();
        if(!isset($_SESSION['on'])) {
            return false;
        } else {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $title = htmlspecialchars($_POST['title']);
            $text = htmlspecialchars($_POST['text']);
            $check = htmlspecialchars($_POST['check']);
            Todo::editTodo($id,$name,$email,$title,$text,$check);
            return true;
        }
    }

}
