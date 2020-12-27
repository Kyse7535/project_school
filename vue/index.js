let table = document.getElementById("table");
window.addEventListener("load", mainFunction)


function getTrChild(tr_list) {
    let tr_child_list = [];
    for (i = 0; i < tr_list.length; i++) {
        tr_child_list.push(tr_list[i].children);
    }
    return tr_child_list;
}

function findTrChild(tr_child_list, element) {
    for (i = 0; i < tr_child_list.length; i++) {
        for (j = 0; j < tr_child_list[i].length; j++) {

            if (tr_child_list[i][j].firstChild != null && tr_child_list[i][j].firstChild == element) {
                return tr_child_list[i]
            }
        }
    }
}

function inputEvent(inputs_list, tr_child_list) {
    inputs_list.forEach(element => {
        if (element.type == "checkbox") {
            element.addEventListener("click", () => {
                let somme_differe = parseInt(document.getElementById('somme_differe').value);
                let tr_child = findTrChild(tr_child_list, element);
                let prix = tr_child[1].textContent;
                if (element.checked) {
                    if (element.value == "differe") {
                        somme_differe = parseInt(somme_differe) + parseInt(prix);

                    }
                    if (element.value == "paye") {
                        if (tr_child[3].firstChild.checked) {
                            somme_differe = parseInt(somme_differe) - parseInt(prix);
                        }
                    }

                } else {
                    if (element.value == "paye") {
                        if (tr_child[3].firstChild.checked) {
                            somme_differe = parseInt(somme_differe) + parseInt(prix);
                        }
                    } else {
                        somme_differe = parseInt(somme_differe) - parseInt(prix);
                    }
                }

                document.getElementById('somme_differe').setAttribute("value", somme_differe);
                //console.log(tr_child[5].value)
            });
        }
    });
}

function getInputChild(tr_child) {
    let inputs = [];
    for (i = 0; i < tr_child.length; i++) {
        if (tr_child[i].tagName == "TD" && tr_child[i].firstChild.tagName == "INPUT" && !tr_child[i].firstChild.disabled) {
            inputs.push(tr_child[i].firstChild);
        }
        if (tr_child[i].tagName == "INPUT") {
            inputs.push(tr_child[i])
        }
    }
    return inputs;
}

function getHiddenInput(tr_child) {
    let hidden;
    for (j = 0; j < tr_child.length; j++) {
        if (tr_child[j].tagName == "INPUT" && tr_child[j].type == "hidden") {
            //console.log(tr_child[j].getAttribute("id"))
            return tr_child[j];
        }

    }
    return null;
}

function getInputByValue(input_value, input_list) {
    for (i = 0; i < input_list.length; i++) {
        if (input_list[i].value == input_value) {
            return input_list[i];
        }
    }
    return null;
}

function getInputDiffere(input_list) {
    let input_differe = [];
    for (i = 0; i < input_list.length; i++) {
        input_list.push(getInputByValue("differe", input_list));
    }
    return input_differe;
}

function checkForm() {
    let paiement_form = document.getElementById('paiement_form');
    paiement_form.addEventListener('submit', (event) => {
        let somme_differe = document.getElementById('somme_differe');
        if (somme_differe.validity.rangeOverflow) {
            event.preventDefault();
            document.getElementById('error_msg').style.display = "block"
        }

    })
}

function mainFunction() {
    document.getElementById('error_msg').style.display = "none"
    let tr_list = document.getElementsByTagName('tr');
    let tr_child_list = getTrChild(tr_list);
    tr_child_list.forEach(item => {
        let inputs_list = getInputChild(item);
        inputEvent(inputs_list, tr_child_list);
        if (inputs_list.length == 4) {
            console.log("ùmlkjh")
            let hidden = getHiddenInput(item);
            let input_paye = getInputByValue("paye", inputs_list);
            let input_attente = getInputByValue("attente", inputs_list);
            let input_differe = getInputByValue("differe", inputs_list);
            if (hidden.value == "differe") {
                input_attente.disabled = true;
                input_differe.checked = true;
                input_differe.disabled = true;
            }
            if (hidden.value == "paye") {
                input_attente.disabled = true;
                input_differe.disabled = true;
                input_paye.disabled = true;
            }
            if (hidden.value == "attente") {
                input_attente.disabled = true;
                input_attente.checked = true;
            }
            checkForm();
        }
    });
}