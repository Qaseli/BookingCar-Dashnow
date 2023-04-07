const userEmail = localStorage.getItem('userEmail');
const userpassword = localStorage.getItem('userPassword');
const data = { userEmail: userEmail, Password: userpassword };

try {
    const response = await fetch('http://localhost/Project%20Louiszla/userLogin.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const result = await response.text();
    console.log(result);
} catch (error) {
    console.error(error);
}