
let slides = document.getElementsByClassName("slide");
let INDEX = 0;

function render(n = 0) {

    for(let i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }

    if(n == 0){
        document.getElementById("left-button").disabled = true;
    }

    if(n > slides.length){
        n = slides.length - 3;
    }




    for(let j = n;  j < n + 3; j++){


        slides[j].style.display = "inline";

        if(n < j && j < n + 2)  {
            slides[j].classList.add("active");
        }else{
            slides[j].classList.remove("active");
        }
    }
}

document.getElementById("left-button").onclick = function(){
    --INDEX;
    if(INDEX < 0){
        INDEX = slides.length - 3;
        console.log(INDEX);
    }

    render(INDEX);
};

document.getElementById("right-button").onclick = function(){
    ++INDEX;
    if(INDEX > slides.length - 3){
        INDEX = 0

    }
    render(INDEX);
};


render(INDEX);

