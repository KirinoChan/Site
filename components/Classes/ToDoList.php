<?php

class ToDoList
{

    private function verifyEmail($email)
    {
        $pattern = "/(^[a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3}$)/";
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            echo json_encode(array("success" => "0"));
            return false;
        }
    }

    public function addToDo($name, $email, $title, $text, $db)
    {
        if ($this->verifyEmail($email)) {
            $st = $db->prepare("insert into todo(name,email,title,text) values(:name,:email,:title,:text)");
            $st->execute(array("name" => $name, "email" => $email, "title" => $title, "text" => $text));
            echo json_encode(array("success" => "1"));
        }
    }


    public function editToDo($id, $name, $email, $title, $text, $check, $db)
    {
        if ($this->verifyEmail($email, $db)) {
            $st = $db->prepare("select text from todo where id = :id");
            $st->execute(array("id" => $id));
            $matches = $st->fetch(PDO::FETCH_ASSOC);
            if ($matches['text'] != $text) {
                if ($check == 0) {
                    $st = $db->prepare("update todo set name = :name, title = :title, email = :email, text = :text, edited_by_admin = 1 where id = :id");
                    $st->execute(array("name" => $name, "title" => $title, "email" => $email, "text" => $text, "id" => $id));
                    header('Location:/1');
                } else {
                    $st = $db->prepare("update todo set name = :name, title = :title, email = :email, text = :text, edited_by_admin = 1, is_done = 1 where id = :id");
                    $st->execute(array("name" => $name, "title" => $title, "email" => $email, "text" => $text, "id" => $id));
                    header('Location:/1');
                }
            } else {
                if ($check == 0) {
                    $st = $db->prepare("update todo set name = :name, title = :title, email = :email, text = :text, is_done = 0 where id = :id");
                    $st->execute(array("name" => $name, "title" => $title, "email" => $email, "text" => $text, "id" => $id));
                    header('Location:/1');
                } else {
                    $st = $db->prepare("update todo set name = :name, title = :title, email = :email, text = :text, is_done = 1 where id = :id");
                    $st->execute(array("name" => $name, "title" => $title, "email" => $email, "text" => $text, "id" => $id));
                    header('Location:/1');
                }
            }
        }
    }
}
