//ADUNAREA SECTIUNILOR

function sum() {
    var numarul1 = document.getElementById('nr1').value;
    var numarul2 = document.getElementById('nr2').value;
    var numarul3 = document.getElementById('nr3').value;
    var numarul4 = document.getElementById('nr4').value;
    var numarul5 = document.getElementById('nr5').value;

    var result = parseInt(numarul1) + parseInt(numarul2) + parseInt(numarul3) + parseInt(numarul4) + parseInt(numarul5);
    if (!isNaN(result)) {
        document.getElementById('nrsuma').value = result;
    }
}

// TOOLTIP

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

// PIE CHART

const economii = document.querySelector('.economii-input');
const alimente = document.querySelector('.alimente-input');
const intretinere = document.querySelector('.intretinere-input');
const educatie = document.querySelector('.educatie-input');
const distractie = document.querySelector('.distractie-input');
const altele = document.querySelector('.altele-input')

const ctx = document.getElementById('mychart').getContext('2d');
let mychart = new Chart(ctx, {

    type: "pie",
    data: {


        labels: ['Economii', 'Alimente', 'Intretinere', 'Educatie', 'Distractie', 'Altele'],
        datasets: [{

            label: 'Total RON',
            data: [0, 0, 0, 0, 0, 0],
            backgroundcolor: 'rgb(255, 99, 132)',
            borderwidth: 4

        }]

    }
});

const updateChartValue = (input, dataOrder) => {

    input.addEventListener('change', e => {
        mychart.data.datasets[0].data[dataOrder] = e.target.value;
        mychart.update();

    })
};

updateChartValue(economii, 0);
updateChartValue(alimente, 1);
updateChartValue(intretinere, 2);
updateChartValue(educatie, 3);
updateChartValue(distractie, 4);
updateChartValue(altele, 5);

//CALCULATOR

const keys = document.querySelectorAll('.key');
const display_input = document.querySelector('.display .input');
const display_output = document.querySelector('.display .output');

let input = "";

for (let key of keys) {
    const value = key.dataset.key;

    key.addEventListener('click', () => {
        if (value == "clear") {
            input = "";
            display_input.innerHTML = "";
            display_output.innerHTML = "";
        } else if (value == "backspace") {
            input = input.slice(0, -1);
            display_input.innerHTML = CleanInput(input);
        } else if (value == "=") {
            let result = eval(PerpareInput(input));

            display_output.innerHTML = CleanOutput(result);
        } else if (value == "brackets") {
            if (
                input.indexOf("(") == -1 ||
                input.indexOf("(") != -1 &&
                input.indexOf(")") != -1 &&
                input.lastIndexOf("(") < input.lastIndexOf(")")
            ) {
                input += "(";
            } else if (
                input.indexOf("(") != -1 &&
                input.indexOf(")") == -1 ||
                input.indexOf("(") != -1 &&
                input.indexOf(")") != -1 &&
                input.lastIndexOf("(") > input.lastIndexOf(")")
            ) {
                input += ")";
            }

            display_input.innerHTML = CleanInput(input);
        } else {
            if (ValidateInput(value)) {
                input += value;
                display_input.innerHTML = CleanInput(input);
            }
        }
    })
}

function CleanInput(input) {
    let input_array = input.split("");
    let input_array_length = input_array.length;

    for (let i = 0; i < input_array_length; i++) {
        if (input_array[i] == "*") {
            input_array[i] = ` <span class="operator">x</span> `;
        } else if (input_array[i] == "/") {
            input_array[i] = ` <span class="operator">÷</span> `;
        } else if (input_array[i] == "+") {
            input_array[i] = ` <span class="operator">+</span> `;
        } else if (input_array[i] == "-") {
            input_array[i] = ` <span class="operator">-</span> `;
        } else if (input_array[i] == "(") {
            input_array[i] = `<span class="brackets">(</span>`;
        } else if (input_array[i] == ")") {
            input_array[i] = `<span class="brackets">)</span>`;
        } else if (input_array[i] == "%") {
            input_array[i] = `<span class="percent">%</span>`;
        }
    }

    return input_array.join("");
}

function CleanOutput(output) {
    let output_string = output.toString();
    let decimal = output_string.split(".")[1];
    output_string = output_string.split(".")[0];

    let output_array = output_string.split("");

    if (output_array.length > 3) {
        for (let i = output_array.length - 3; i > 0; i -= 3) {
            output_array.splice(i, 0, ",");
        }
    }

    if (decimal) {
        output_array.push(".");
        output_array.push(decimal);
    }

    return output_array.join("");
}

function ValidateInput(value) {
    let last_input = input.slice(-1);
    let operators = ["+", "-", "*", "/"];

    if (value == "." && last_input == ".") {
        return false;
    }

    if (operators.includes(value)) {
        if (operators.includes(last_input)) {
            return false;
        } else {
            return true;
        }
    }

    return true;
}

function PerpareInput(input) {
    let input_array = input.split("");

    for (let i = 0; i < input_array.length; i++) {
        if (input_array[i] == "%") {
            input_array[i] = "/100";
        }
    }

    return input_array.join("");
}