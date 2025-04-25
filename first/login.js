document.addEventListener('DOMContentLoaded',function() {
    setTimeout(() => {
        const alert = document.getElementById('success');
        if (alert) {
            window.location.href = "./login.php";
        }
        },2000);
    });
