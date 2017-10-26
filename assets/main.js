$(document).ready(function () {
    //Get all the products
    $.ajax({
        url:'route.php',
        type:'get',
        data:{
            title:"name"
        }
    }).done(function (products) {
        products = JSON.parse(products);
        // console.log(products);
        for (let product of  products){
            // console.log(product.productname);
            document.getElementById('products').innerHTML +=
            `<div class="col-sm-6 col-md-6">
            <div  class="thumbnail">
                    <img id="product_image" src="${product.imglink}" alt="...">
                    <div class="caption">
                        <h3>${product.productname}</h3>
                        <p>${product.description}</p>
                        <p><a id="${product.id}"  class="btn btn-primary" onclick="addTocartClicked(event)" role="button">Add to Cart</a></p>
                    </div>
                </div></div>`
        };

    });


});
//Add product to the cart
function addTocartClicked(event) {
    event.preventDefault();
    $.ajax({
        url:'route.php',
        type:'get',
        data:{
            id:`${event.target.id}`
        }
    }).done(function (data) {
        console.log(data);
    });
}


//
// $('.addToCart').click( function (e) {
//     console.log('add to cart clicked');
//     e.preventDefault();
// });