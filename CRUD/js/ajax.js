$(function () {
    $("#task-result").hide()
    fetchTasks()
    let edit = false

    $("#search").keyup(() => {
        if ($("#search").val()) {
            let search = $("#search").val();
            $.ajax({
                url: "php/buscar-tarea.php",
                data: { search },
                type: "POST",
                success: function (response) {
                    if (!response.error) {
                        let tasks = JSON.parse(response);
                        let template = ``;
                        tasks.forEach(task => {
                            template += `<li class="task-item">${task.producto}</li>`
                        });
                        $("#task-result").show();
                        $("#container").html(template);
                    }
                }
            })
        }
    })

    $("#task-form").submit(e => {
        e.preventDefault();
        const postData = {
            producto: $("#producto").val(),
            categoria: $("#categoria").val(),
            stock: $("#stock").val(),
            precio: $("#precio").val(),
            id: $("#taskId").val()
        }

        const url = edit === false ? "php/agregar-tarea.php" : "php/editar-tarea.php";

        $.ajax({
            url,
            data: postData,
            type: "POST",
            success: function (response) {
                if (!response.error) {
                    fetchTasks();
                    $("#task-form").trigger("reset")
                }
            }
        })
    })

    function fetchTasks() {
        $.ajax({
            url: "php/listar-tareas.php",
            type: "GET",
            success: function (response) {
                const tasks = JSON.parse(response);
                let template = ``;
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td>${task.id}</td>
                            <td>${task.producto}</td>
                            <td>${task.categoria}</td>
                            <td>${task.stock}</td>
                            <td>${task.precio}</td>
                            <td>
                                <button class="btn btn-danger task-delete">Eliminar</button>
                                <button class="btn btn-warning task-item">Modificar</button>
                            </td>
                        </tr>
                        `;
                })
                $("#tasks").html(template);
            }
        })
    }

    $(document).on("click", ".task-delete", () => {
        if (confirm("¿Desea eliminar?")) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr("taskId")
            $.post("php/eliminar-tarea.php", { id }, () => {
                fetchTasks()
            })
        }
    })

    $(document).on("click", ".task-item", () => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr("taskId")
        let url = "php/obtener-una-tarea.php"
        $.ajax({
            url,
            data: { id },
            type: "POST",
            success: function (response) {
                if (!response.error) {
                    const task = JSON.parse(response)
                    $("#producto").val(task.producto)
                    $("#categoria").val(task.categoria)
                    $("#stock").val(task.stock)
                    $("#precio").val(task.precio)
                    $("#taskId").val(task.id)
                    edit = true
                }
            }
        })
    })

})