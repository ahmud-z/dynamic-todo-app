const checkboxes = document.getElementsByClassName('todo_status_checkbox')

function updateTodoInDB(id, status = false) {
    const form = new FormData();
    form.append('id', id)
    form.append('status', status)

    fetch('/update-todo.php', {
        method: 'post',
        body: form
    });
}


for (let index = 0; index < checkboxes.length; index++) {
    const element = checkboxes[index];

    element.addEventListener('change', function (e) {
        if (e.target.checked) {
            e.target.parentElement.classList.add('completed')
        } else {
            e.target.parentElement.classList.remove('completed')
        }

        updateTodoInDB(e.target.getAttribute('data-id'), e.target.checked)
    })
}