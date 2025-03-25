const calculate = (operator) => {
    let num1 = parseFloat(document.getElementById("num1").value);
    let num2 = parseFloat(document.getElementById("num2").value);

    console.log("Num1:", num1, "Num2:", num2, "Operator:", operator); // Debugging

    if (isNaN(num1) || isNaN(num2)) {
        document.getElementById("calcResult").innerText = "Masukkan angka yang valid!";
        return;
    }

    const operations = {
        '+': (a, b) => a + b,
        '-': (a, b) => a - b,
        '*': (a, b) => a * b,
        '/': (a, b) => b !== 0 ? a / b : "Error: Bagi 0",
        '%': (a, b) => b !== 0 ? a % b : "Error: Bagi 0"
    };

    let result = operations[operator](num1, num2);
    console.log("Hasil:", result); // Debugging
    document.getElementById("calcResult").innerText = `Hasil: ${result}`;
};
