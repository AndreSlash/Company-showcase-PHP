let add=document.getElementById("add");
let form=document.getElementById("form");
add.addEventListener("click",()=>{
    form.classList.toggle("d-flex");
    add.classList.toggle("d-none");
})