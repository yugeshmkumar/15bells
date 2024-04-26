function dialHandler(e, phoneNumber) {
    e.preventDefault();
    const data = {
        customer_number: phoneNumber,
    };
    KNW_WIDGET.sendMessage("c2c_call", data);
}

