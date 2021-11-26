const count = document.getElementById("count-number");
const plus = document.getElementById("minus");
const minus = document.getElementById("plus");

let number = 0;

plus.addEventListener("click", ()=>{
    number++;
    count.innerHTML = number;
});

minus.addEventListener("click", ()=>{
    if (number==0)
    {

    }
    else
    {
        number--;
        count.innerHTML = number;
    }
});