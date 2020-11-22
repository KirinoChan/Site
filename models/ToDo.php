<?php
class toDo
{

    public static function getToDoList($page)
    {
        $db = Db::getConnection();
        $todoList = array();
        $num = 3;
        $start = $page * $num - $num;
        $st = $db->prepare("select * from todo");
        $st->execute();
        $count = $st->rowCount();
        $total = intval(($count - 1) / $num) + 1;

        if (empty($_SESSION['sortType']) || $_SESSION['sortType'] == 'id') {
            $result = $db->query("SELECT id,title,date,name,email,text,edited_by_admin, is_done from todo order by id desc limit $start, $num");
        }

        if ($_SESSION['sortType'] == 'email') {
            $result = $db->query("SELECT id,title,date,name,email,text,edited_by_admin, is_done from todo order by email asc limit $start, $num");
        }

        if ($_SESSION['sortType'] == 'name') {
            $result = $db->query("SELECT id,title,date,name,email,text,edited_by_admin, is_done from todo order by name asc limit $start, $num");
        }

        if ($_SESSION['sortType'] == 'status') {
            $result = $db->query("SELECT id,title,date,name,email,text,edited_by_admin, is_done from todo order by edited_by_admin asc limit $start, $num");
        }

        $i = 0;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $todoList[$i]['id'] = $row['id'];
            $todoList[$i]['email'] = $row['email'];
            $todoList[$i]['name'] = $row['name'];
            $todoList[$i]['title'] = $row['title'];
            $todoList[$i]['date'] = $row['date'];
            $todoList[$i]['text'] = $row['text'];
            $todoList[$i]['edited_by_admin'] = $row['edited_by_admin'];
            $todoList[$i]['is_done'] = $row['is_done'];
            $todoList[$i]['page'] = $page;
            $todoList[$i]['total'] = $total;
            $todoList[$i]['count'] = $count;
            $i++;
        }
        return $todoList;
    }

    public static function login($login, $pass) {
        $db = Db::getConnection();
        $user = new User;
        $user->login($login,$pass,$db);
    }

    public static function verifyTodo($name, $email, $title, $text)
    {
        $db = Db::getConnection();
        $todo = new ToDoList;
        $todo->addTodo($name, $email, $title, $text, $db);
    }

    public static function editTodo($id,$name,$email,$title,$text,$check) {
        $db = Db::getConnection();
        $todo = new ToDoList;
        $todo->editTodo($id,$name, $email, $title, $text,$check, $db);
    }
}
