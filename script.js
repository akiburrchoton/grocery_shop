function display_menu_image(id){
    const display_menu_image = document.getElementById("display_menu_image");

    if(id == "frozenfood"){
        display_menu_image.src = "images/frozen_food_fish_finger.png";
        display_menu_image.useMap = "#frozenfood";
    }else if( id == "freshfood"){
        display_menu_image.src = "images/fresh_food_cheddarcheese.png";
        display_menu_image.useMap = "#freshfood";

        console.log(display_menu_image);
    }else if( id == "beverage"){
        display_menu_image.src = "images/beverage_coffee.png";
        display_menu_image.useMap = "#beverage";
    }else if( id == "health"){
        display_menu_image.src = "images/home_health_panadol.png";
        display_menu_image.useMap = "#health";
    }else if( id == "petfood"){
        display_menu_image.src = "images/petfood_dryfood.png";
        display_menu_image.useMap = "#petfood";
    }
}

// function hide_menu_image(id){
//     const display_menu_image = document.getElementById("display_menu_image");

//     setTimeout(function() {
//         display_menu_image.src = "";
//        }, 5000);
    
// }