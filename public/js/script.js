document.addEventListener("DOMContentLoaded", function () {
    let now = new Date();
    let copy_p = document.getElementById("copyright");
    copy_p.textContent = now.getFullYear() + " ©";
});
