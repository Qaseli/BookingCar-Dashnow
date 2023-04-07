function sendRegister() {
    const agree = document.forms[0].agree.checked

    if (agree) {
        const adminUsername = document.forms[0].userName.value;
        const phoneNo = document.forms[0].mobileNumber.value;
        const adminEmail = document.forms[0].emailAddress.value;
        const password = document.forms[0].Password.value;
        const confirmPassword = document.forms[0].ConfirmPassword.value;

        if (confirmPassword !== password)
            return alert("Password and confirm password not same");

        document.forms[0].submit();
    }
    else {
        return alert("You not agree with our Term Of Service")
    }
}