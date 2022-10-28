function toggleModal() {
    document.getElementById("modal").classList.toggle("hidden");
}

function toggleModal2() {
    document.getElementById("modal2").classList.toggle("hidden");
}

function onChangeLearn(e) {
    const htmlLearn = e.getAttribute("learn-attr");
    const learn = JSON.parse(htmlLearn);

    document.querySelector("#make-solution").disabled = false;
    document
        .querySelector("#make-solution")
        .setAttribute("solution-id", learn.plugin_learn_id);
    document.querySelector(
        "#make-label"
    ).innerHTML = `Guardar con solución #${learn.plugin_learn_id}`;
}

async function makeSol() {
    const htmlButton = document.querySelector("#make-solution");
    const learnId = htmlButton.getAttribute("solution-id");
    const ticketId = htmlButton.getAttribute("ticket-id");

    if (confirm(`¿Deseas agregar la solución ${learnId} para este ticket?`) == true) {
        const res = await axios.post("/ticket/store-work", {
            learnId,
            ticketId
        });    
    
        location.href = `/ticket/${ticketId}`;
    }
}

async function disabledUser(id) {
    try {
        const confirmed = confirm("¿Deseas desactivar usuario?");

        if (confirmed) {
            await axios.post("/users/disabled", { id });
            
            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar usuario. Intenta más tarde."
        );
    }
}

async function disabledRole(id) {
    try {
        const confirmed = confirm("¿Deseas desactivar rol?");

        if (confirmed) {
            await axios.post("/roles/disabled", { id });

            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar rol. Intenta más tarde."
        );
    }
}

async function disabledOs(id) {
    try {
        const confirmed = confirm("¿Deseas eliminar sistema operativo?");

        if (confirmed) {
            await axios.post("/os/disabled", { id });

            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar sistema operativo. Intenta más tarde."
        );
    }
}

async function disabledSeverity(id) {
    try {
        const confirmed = confirm("¿Deseas desactivar estado?");

        if (confirmed) {
            await axios.post("/severity/disabled", { id });

            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar estado. Intenta más tarde."
        );
    }
}

async function disabledExecute(id) {
    try {
        const confirmed = confirm("¿Deseas desactivar estado?");

        if (confirmed) {
            await axios.post("/execute/disabled", { id });

            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar estado. Intenta más tarde."
        );
    }
}

async function disabledState(id) {
    try {
        const confirmed = confirm("¿Deseas desactivar estado?");

        if (confirmed) {
            await axios.post("/states/disabled", { id });

            location.reload();
        }
    } catch (error) {
        alert(
            "Ha ocurrido un error al tratar de desactivar estado. Intenta más tarde."
        );
    }
}

const input = document.getElementById("import");

input.addEventListener("change", function () {
    readXlsxFile(input.files[0]).then(function (rows) {
        let i = 0;

        rows.map((row, index) => {
            if (i === 0) {
                let table = document.getElementById("import-table");
                generateTableHead(table, row);
            }

            if (i > 0) {
                let table = document.getElementById("import-table");
                generateTableRows(table, row);
            }
            i++;
        });
    });
});

function generateTableHead(table, data) {
    let thead = table.createTHead();
    thead.setAttribute("class", "border-b");

    let row = thead.insertRow();

    for (let key of data) {
        let th = document.createElement("th");
        let text = document.createTextNode(key);

        th.appendChild(text);
        th.setAttribute("scope", "col");
        th.setAttribute(
            "class",
            "text-sm font-medium text-gray-900 px-6 py-4 text-left"
        );
        row.appendChild(th);
    }
}

function generateTableRows(table, data) {
    let newRow = table.insertRow(-1);
    data.map((row, index) => {
        let newCell = newRow.insertCell();
        let newText = document.createTextNode(row);
        newCell.appendChild(newText);
    });
}
