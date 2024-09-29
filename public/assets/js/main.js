function addClassPointer(element) {
    element.classList.add("bg-blue-lt");
}

function removeClassPointer(element) {
    element.classList.remove("bg-blue-lt");
}

function formatPhoneNumber(value) {
    let numericValue = value.replace(/\D/g, '');

    if (numericValue.length > 0 && numericValue[0] !== '7') {
        numericValue = '7' + numericValue;
    }

    let formattedNumber = '+7';
    if (numericValue.length > 1) {
        formattedNumber += ' (' + numericValue.substring(1, 4);
    }
    if (numericValue.length >= 5) {
        formattedNumber += ') ' + numericValue.substring(4, 7);
    }
    if (numericValue.length >= 8) {
        formattedNumber += ' ' + numericValue.substring(7, 9);
    }
    if (numericValue.length >= 10) {
        formattedNumber += ' ' + numericValue.substring(9, 11);
    }

    console.log(formattedNumber.length)

    return formattedNumber;
}

function onPhoneNumberChange(event) {
    let input = event.target;
    input.value = formatPhoneNumber(input.value);
}
