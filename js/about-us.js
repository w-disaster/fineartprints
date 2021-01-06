const photos = ["Damien-Hirst.jpeg", "carrier-express.webp", "sofa.png"];
const descriptions = ["Damien Hirst photo", "carrier image", "home's sofa image"];

const main = `<div class="row border m-4">
        <div class="col-12 col-lg-7 p-0 m-0 d-flex align-items-center">
            <div class="col-2 col-lg-2 p-1 m-0 text-center">
                <a class="btn btn-primary" href="#">L</a>
            </div>                            
            <div class="image col-8 col-lg-8 p-0 my-3 text-center">
            </div>
            <div class="col-2 col-lg-2 p-1 m-0 text-center">
                <a class="btn btn-primary" href="#">R</a>
            </div>
            
        </div>
        <div class=" col-12 col-lg-3 align-self-center">
            <div class="aside py-0">
                <p class="description col-12 col-lg-12 text-center"
                    style="font-size: 18px;">
                </p>
                <div class="col-12 col-md-12 py-3 text-center">
                    <a class="btn btn-primary border" href="#">Explore</a>
                </div>
                
            </div>
        </div> 
    </div>`;

let index = 0;

function replaceAndSubstituteMain(index){
    document.querySelector(".image").innerHTML = '<img class="img-fluid" src="upload/' + photos[index] + '" alt="" />';
    document.querySelector(".description").innerHTML = descriptions[index];
}

$(document).ready(function(){

    document.querySelector("main").innerHTML = main;
    replaceAndSubstituteMain(0);

    
    setInterval(function(){
        index++;
        if(index == 3){
            index = 0;
        }
        console.log(index);
        replaceAndSubstituteMain(index);
    }, 5000);
    
    

});