/* import Glide from "@glidejs/glide";

new Glide(".glide", {
    type: "carousel",
    gap: 0,
    animationDuration: 1000,
    animationTimingFunc: "ease-in-out",
}).mount();
 */
/* single-product js */
document.addEventListener('DOMContentLoaded', function(){
    var productRating = 3;
    var starPercentage = (productRating / 5) * 100;
    // Round to nearest 10
    var starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;

    // Set width of stars-inner to percentage
    var star_elements = document.querySelectorAll('.stars-inner');
    for(let i=0; i<star_elements.length; i++){
        star_elements[i].style.width = starPercentageRounded;
    }
    // In stock handler
    var add_btn = document.querySelector('.add-stock');
    var remove_btn = document.querySelector('.remove-stock');

    add_btn.addEventListener('click',function(){
        var counter = document.querySelector('.stock-counter');
        if (parseInt(counter.innerHTML, 10)>=1){
            counter.innerHTML = parseInt(counter.innerHTML, 10) + 1;
            return parseInt(counter.innerHTML, 10);
        }
    });
    
    remove_btn.addEventListener('click',function(){
        var counter = document.querySelector('.stock-counter');
        if (parseInt(counter.innerHTML, 10)>1){
            counter.innerHTML = parseInt(counter.innerHTML, 10) - 1;
            return parseInt(counter.innerHTML, 10);
        }
    }); 
        
});


var handlesSlider = document.getElementById('slider-handles');

noUiSlider.create(handlesSlider, {
    start: [0, 1000],
    step: 10,
    connect: true,
    behaviour: 'drag-tap',
    range: {
        'min': [0],
        'max': [1000]
    }
    
});
var stepSliderValueElement = document.getElementById('slider-value');

handlesSlider.noUiSlider.on('update', function (values) {
    stepSliderValueElement.innerHTML = values.join(' - ');
});

// get the values of the slider handler
var filterBtn = document.getElementById('filter-btn');

filterBtn.addEventListener('click', function(){
    var priceRange = handlesSlider.noUiSlider.get();
    var lowerPrice = parseInt(priceRange[0], 10);
    var upperPrice = parseInt(priceRange[1], 10);
    var lower_input = document.querySelectorAll('#lower');
    var upper_input = document.querySelectorAll('#upper');
    for(let i=0; i<lower_input.length; i++){
        lower_input[i].value = lowerPrice;
        upper_input[i].value = upperPrice;
    }
});
var sort_btn = document.getElementById('sort-btn');
sort_btn.addEventListener('click', function(){
    var priceRange = handlesSlider.noUiSlider.get();
    var lowerPrice = parseInt(priceRange[0], 10);
    var upperPrice = parseInt(priceRange[1], 10);
    var lower_input = document.querySelectorAll('#lower');
    var upper_input = document.querySelectorAll('#upper');
    for(let i=0; i<lower_input.length; i++){
        lower_input[i].value = lowerPrice;
        upper_input[i].value = upperPrice;
    }
});