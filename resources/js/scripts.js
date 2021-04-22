/* import Glide from "@glidejs/glide";

new Glide(".glide", {
    type: "carousel",
    gap: 0,
    animationDuration: 1000,
    animationTimingFunc: "ease-in-out",
}).mount(); */


//////////////////////////////////////////////////////////////////////////
                /* single-product JS code */                                   
//////////////////////////////////////////////////////////////////////////



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

//////////////////////////////////////////////////////////////////////////
 /* archive-product.php && taxonomy-product-category.php JS functions */    
//////////////////////////////////////////////////////////////////////////

// get the current location url search parameters (returns as a string)
var currentLocation = window.location;

// match this string for sequance of numbers using regex
var numberPattern = /\d+/g;
var getRequest_numArr = currentLocation.search.match(numberPattern);

// match this string for some sorting values using regex
var orderbyPattern = /(?:DESC|ASC|price|date)/g;
var getRequest_orderby = currentLocation.search.match(orderbyPattern);

/* if there is sorting by any paramter then put the sorting value in single 
string to use it for comparison to render select options tag */
if (getRequest_orderby){
    var orderby_val = getRequest_orderby[0]+' '+getRequest_orderby[1];
}

// get the order list with the sorting by option selected if not render the default sorting list options
var orderbyList = document.getElementById("orderby-list");
if (orderby_val === 'DESC price'){
    orderbyList.innerHTML = `
        <option value="default">default sorting</option>
        <option value="ASC price" >sort by price low to high</option>
        <option selected="selected" value="DESC price" >sort by price high to low</option>
        <option value="DESC date" >sort by latest</option>`;
}else if (orderby_val === 'ASC price'){
    orderbyList.innerHTML = `
        <option value="default">default sorting</option>
        <option selected="selected" value="ASC price" >sort by price low to high</option>
        <option value="DESC price" >sort by price high to low</option>
        <option value="DESC date" >sort by latest</option>`;
}else if (orderby_val === 'DESC date'){
    orderbyList.innerHTML = `
        <option value="default">default sorting</option>
        <option value="ASC price" >sort by price low to high</option>
        <option value="DESC price" >sort by price high to low</option>
        <option selected="selected" value="DESC date" >sort by latest</option>`;
}else{
    orderbyList.innerHTML = `
        <option selected="selected" value="default">default sorting</option>
        <option value="ASC price" >sort by price low to high</option>
        <option value="DESC price" >sort by price high to low</option>
        <option value="DESC date" >sort by latest</option>`;
}
// set the defualt slider values
var slider_low = 0;
var slider_up = 1000;

// if the slider is moved change the default value
if (getRequest_numArr){
    slider_low = getRequest_numArr[0];
    slider_up = getRequest_numArr[1];
}

// create slider using nouislider js lib
var handlesSlider = document.getElementById('slider-handles');
noUiSlider.create(handlesSlider, {
    start: [slider_low, slider_up],
    step: 10,
    connect: true,
    behaviour: 'drag-tap',
    range: {
        'min': [0],
        'max': [1000]
    }
    
});

// add event listener to update slider reading values
var stepSliderValueElement = document.getElementById('slider-value');
handlesSlider.noUiSlider.on('update', function (values) {
    stepSliderValueElement.innerHTML = values.join(' - ');
});

// get the values of the slider handler and send them via GET request to the current url
var filterBtn = document.getElementById('filter-btn');

// filter by price range button eventlistener
filterBtn.addEventListener('click', function(){

    // get the handler values
    var priceRange = handlesSlider.noUiSlider.get();

    // split them to upper and lower and return them as integers
    var lowerPrice = parseInt(priceRange[0], 10);
    var upperPrice = parseInt(priceRange[1], 10);

    // get all the hidden input tags and set there values to the new handler values to send them via GET
    var lower_input = document.querySelectorAll('#lower');
    var upper_input = document.querySelectorAll('#upper');
    for(let i=0; i<lower_input.length; i++){
        lower_input[i].value = lowerPrice;
        upper_input[i].value = upperPrice;
    }

    // send sortby select option value via get method
    var sort_val = document.getElementById("sort-filter");
    
    // if the sorting is default don't send any sorting values else send the values
    if (orderbyList.value == 'default'){
        sort_val.setAttribute("name", "");
    }else{
        sort_val.value = orderbyList.value;
    }
});

// sort list change event listener 
orderbyList.addEventListener("change", function(){

    // get the handler values
    var priceRange = handlesSlider.noUiSlider.get();

    // split them to upper and lower and return them as integers
    var lowerPrice = parseInt(priceRange[0], 10);
    var upperPrice = parseInt(priceRange[1], 10);

    // get all the hidden input tags and set there values to the new handler values to send them via GET
    var lower_input = document.querySelectorAll('#lower');
    var upper_input = document.querySelectorAll('#upper');
    for(let i=0; i<lower_input.length; i++){
        lower_input[i].value = lowerPrice;
        upper_input[i].value = upperPrice;
    }

    // click on form submit hidden button
    var sort_btn = document.getElementById('sort-btn');
    sort_btn.click();
});

