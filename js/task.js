function maxTitleLength(input) {
    const title = input.value;
    if (title.length > 30) {
        input.value = title.substring(0, 30);
    }
}

function maxDescriptionLength(input) {
    const description = input.value;
    if (description.length > 500) {
        input.value = description.substring(0, 500);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("add-task");
    if (form != null) {
        const title = document.getElementById("task-name");
        const radioButtonValues = document.getElementsByName("priority");
        const description = document.getElementById("description");
        form.addEventListener("submit", function (event) {
            title.value = title.value.trim();
            description.value = description.value.trim();
            if (title.value == "") {
                console.log;
                alert("A tarefa deve ter um nome");
                event.preventDefault();
            }
            let radioButtonFlag = false;
            for (radioButton in radioButtonValues) {
                if (radioButtonValues[radioButton].checked) {
                    radioButtonFlag = true;
                }
            }
            if (!radioButtonFlag) {
                alert("Selecione uma prioridade");
                event.preventDefault();
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("edit-task");
    if (form != null) {
        const title = document.getElementById("task-name");
        const radioButtonValues = document.getElementsByName("priority");
        // console.log(form);
        console.log;
        console.log(title.value);
        form.addEventListener("submit", function (event) {
            title.value = title.value.trim();
            if (title.value == "") {
                console.log;
                alert("A tarefa deve ter um nome");
                event.preventDefault();
            }
            let radioButtonFlag = false;
            for (radioButton in radioButtonValues) {
                if (radioButtonValues[radioButton].checked) {
                    radioButtonFlag = true;
                }
            }
            if (!radioButtonFlag) {
                alert("Selecione uma prioridade");
                event.preventDefault();
            }
        });
    }
});
