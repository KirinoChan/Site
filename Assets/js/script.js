$('.inputToDoEdit').on("click", function (e) {
    e.preventDefault();
    let id = $(this).attr("name");
    let inputs = $('.todoInput');
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].getAttribute("name") == id) {
            inputs[i].disabled = 0;
        }
    }

    let buttonsEdit = $('.inputToDoEdit');
    let buttonsSuccess = $('.inputTodoSuccess');
    let editCheckGroup = $('.editCheckGroup');

    for (var i = 0; i < buttonsSuccess.length; i++) {
        if (buttonsSuccess[i].getAttribute("name") == id) {
            buttonsSuccess[i].classList.remove('hidden');
            buttonsEdit[i].classList.add('hidden');
        }
    }

    for (var i = 0; i < editCheckGroup.length; i++) {
        if (editCheckGroup[i].getAttribute("id") == id) {
            editCheckGroup[i].classList.remove('hidden');
        }
    }

    
});


$('#addTodoForm').submit(function (e) {
    e.preventDefault();

    let nameInput = $('#addTodoName');
    let emailInput = $('#addTodoEmail');
    let titleInput = $('#addTodoTitle');
    let textInput = $('#addTodoText');
    let name = $('#addTodoName').val();
    let email = $('#addTodoEmail').val();
    let title = $('#addTodoTitle').val();
    let text = $('#addTodoText').val();
    $.post("/todo/verifytodo", {
        "name": name,
        "email": email,
        "title": title,
        "text": text
    }, function (data) {
        data = JSON.parse(data);
        if (data['success'] == 1) {
            emailInput[0].classList.remove('is-invalid');
            emailInput[0].classList.add('is-valid');
            $('#addTodoForm').hide();
            $('.successAdd')[0].classList.remove('hidden');
            setInterval(redirect,3000);
        }

        if (data['success'] == 0) {
            emailInput[0].classList.add('is-invalid');
        }
    });
});

$('#formSort').submit(function (e) {
    e.preventDefault();
    let sortType = $('#sortType').val();
    $.post("/todo/setsort", {
        "sortType": sortType
    }, function (data) {
        document.location.href = 'http://BeeJee/1';
    });

});

$('#loginSubmit').click(function (e) {
    e.preventDefault();
    let login = $('#userLogin').val();
    let pass = $('#pass').val();
    $.post("/todo/login", {
        "login": login,
        "pass": pass
    }, function (data) {
        data = JSON.parse(data);
        console.log(data['success']);
        if (data['success'] == 1) {
            $('#userLogin').css('border', '3px solid red');
            $('#loginDanger').show();
        }

        if (data['success'] == 2) {
            $('#passDanger').show();
            $('#loginDanger').hide();
            $('#pass').css('border', '3px solid red');
            $('#userLogin').css('border', '1px solid #ced4da');
        }

        if (data['success'] == 3) {
            $('#email').css('border', '3px solid red');
            $('#loginForm').hide();
            $('#loginSubmitGif').show();
            setInterval(redirect, 3000); 
        }
    });
});


$('.inputTodoSuccess').click(function(e){
    e.preventDefault();
    let id = $(this).attr('id');
    let editTitle = $('.editTitle');
    let editName = $('.editName');
    let editEmail = $('.editEmail');
    let editText = $('.editText');
    let editCheck = $('.editCheck');
    let editTitleValue;
    let editNameValue;
    let editEmailValue;
    let editTextValue;
    let editCheckValue;
    for(let i = 0; i<editTitle.length;i++) {
        if(editTitle[i].getAttribute('id') == id) {
              editTitleValue = editTitle[i].value;
        }
    }

    for(let i = 0; i<editName.length;i++) {
        if(editName[i].getAttribute('id') == id) {
             editNameValue = editName[i].value;
        }
    }

    for(let i = 0; i<editEmail.length;i++) {
        if(editTitle[i].getAttribute('id') == id) {
             editEmailValue = editEmail[i].value;
        }
    }

    for(let i = 0; i<editText.length;i++) {
        if(editText[i].getAttribute('id') == id) {
             editTextValue = editText[i].value;
        }
    }

    for(let i = 0; i<editCheck.length;i++) {
        if(editCheck[i].getAttribute('id') == id) {
           //  editCheckValue = editCheck[i].value;
             if(editCheck[i].checked == true) {
                 editCheckValue = 1;
             } else 
                editCheckValue = 0;
        }
    }

    $.post("/todo/edit",{
        "id":id,
        "name": editNameValue,
        "email": editEmailValue,
        "title": editTitleValue,
        "text": editTextValue,
        "check":editCheckValue
    }, function(data){
        redirect();
    });
});

function redirect() {
    document.location.href = 'http://BeeJee/1';
}
