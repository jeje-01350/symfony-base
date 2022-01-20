function increase() {
    // Change the variable to modify the speed of the number increasing from 0 to (ms)
    let SPEED = 20;
    // Retrieve the percentage value
    let limit = parseInt(document.getElementById("value1").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementById("value1").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase();

function increase2() {
    // Change the variable to modify the speed of the number increasing from 0 to (ms)
    let SPEED = 20;
    // Retrieve the percentage value
    let limit = parseInt(document.getElementById("value2").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementById("value2").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase2();

function increase3() {
    // Change the variable to modify the speed of the number increasing from 0 to (ms)
    let SPEED = 20;
    // Retrieve the percentage value
    let limit = parseInt(document.getElementById("value3").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementById("value3").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase3();

function increase4() {
    // Change the variable to modify the speed of the number increasing from 0 to (ms)
    let SPEED = 20;
    // Retrieve the percentage value
    let limit = parseInt(document.getElementById("value4").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementById("value4").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase4();

function increase5() {
    // Change the variable to modify the speed of the number increasing from 0 to (ms)
    let SPEED = 20;
    // Retrieve the percentage value
    let limit = parseInt(document.getElementById("value5").innerHTML, 10);

    for(let i = 0; i <= limit; i++) {
        setTimeout(function () {
            document.getElementById("value5").innerHTML = i + "%";
        }, SPEED * i);
    }
}

increase5();