// function sendRegister() {
//     const agree = document.forms[0].agree.checked

//     if (agree) {
//         const userName = document.forms[0].userName.value;
//         const phoneNo = document.forms[0].mobileNumber.value;
//         const emailAddress = document.forms[0].emailAddress.value;
//         const password = document.forms[0].Password.value;
//         const confirmPassword = document.forms[0].ConfirmPassword.value;

//         if (confirmPassword !== password)
        
//         document.forms[0].submit();
//     }
//     else {
//         return alert("You not agree with our Term Of Service")
//     }
// }

// async function sendData() {
    //     form.prevent
    // }
    
const form = document.forms[0];
form.addEventListener("submit", async (e) =>{
    e.preventDefault();

    if(!form.agree.checked)
        return alert("Please accept our Term and Conditions")
    
    if(form.Password.value != form.ConfirmPassword.value){
        return alert("Password and confirm password not same");
    }

    const payload = new FormData(form);
    const response = await fetch("http://localhost/Project%20Louiszla/userSignup.php",
    {
        method: "POST",
        body:payload
    }).then(res=>res.text())
    
    console.log(response)

    if(response.startsWith("SUCCESS")){
        // Do success method
    }
    else if (response.startsWith("ERROR")){
        if(DataTransfer.split(":")[1] == "EXIST")
            return alert("Email already exist in database")
        alert("There is error")
    }
})