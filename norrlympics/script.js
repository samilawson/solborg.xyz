var inputs = document.getElementsByTagName("input");

function updateNum() {
    var remainder = 32;
    for (var i = 2; i < inputs.length; i++) {
        if (inputs[i].value === "" || parseInt(inputs[i].value) < 0) inputs[i].value = 0;
        remainder -= parseInt(inputs[i].value);
    }
    document.getElementById("remaining").innerHTML = "Points Remaining: " + remainder;
}