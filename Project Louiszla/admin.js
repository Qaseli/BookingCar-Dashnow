if(localStorage.getItem("prior") != null){
    document.querySelector(".account-section").remove()
}else{
    if(confirm("You must login to admin first to acces this page")){
        window.location.href="./Admin-Login.html"
    }else {
        window.location.href = "./DASH.html"
    }
}