function toggleRelay1() {
    const relayToggle1 = document.getElementById("relay-toggle1");
    const relayStatus1 = document.getElementById("relay-status1");

    relayStatus1.value = relayToggle1.checked ? 1 : 0;

    const form = relayToggle1.closest("form");
    form.submit();
}

function toggleRelay2() {
    const relayToggle2 = document.getElementById("relay-toggle2");
    const relayStatus2 = document.getElementById("relay-status2");

    relayStatus2.value = relayToggle2.checked ? 1 : 0;

    const form = relayToggle2.closest("form");
    form.submit();
}

function toggleRelay3() {
    const relayToggle3 = document.getElementById("relay-toggle3");
    const relayStatus3 = document.getElementById("relay-status3");

    relayStatus3.value = relayToggle3.checked ? 1 : 0;

    const form = relayToggle3.closest("form");
    form.submit();
}
function toggleRelay4() {
    const relayToggle4 = document.getElementById("relay-toggle4");
    const relayStatus4 = document.getElementById("relay-status4");

    relayStatus4.value = relayToggle4.checked ? 1 : 0;

    const form = relayToggle4.closest("form");
    form.submit();
}
