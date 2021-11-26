const submenu = document.querySelectorAll(".submenu");
for (let i = 0; i < submenu.length; i++){
    submenu[i].addEventListener("click", function(){
        console.log("funciona");
        if(window.innerWidth < 1024){
            const submenu = this.nextElementSibling;
            const height = submenu.scrollHeight;
            //submenu.classList.add("desplegar");
            submenu.style.height=heigth + "px";
        }

    });
}