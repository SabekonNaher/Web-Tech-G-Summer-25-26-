function calculateTotal()
{
    var price = document.getElementById("price");
    var quantity = document.getElementById("quantity");
    var total = document.getElementById("total");
 
    document.getElementById("quantity_error").innerHTML = "";
    document.getElementById("coupon_message").innerHTML = "";
 
    if(quantity.value <= 0)
    {
        document.getElementById("quantity_error").innerHTML =
        "Quantity can not be 0 or negative "
        total.value = "";
        return;
    }
 
    total.value = price.value * quantity.value;
 
    if(total.value > 1000)
    {
        document.getElementById("coupon_message").innerHTML =
        "You are now eligible for a coupon.";
        return;
    }
 
    deliveryCharge();
}
 
function deliveryCharge()
{
    var total = document.getElementById("total");
    var delivery = document.getElementById("delivery");
    var grandTotal = document.getElementById("grandTotal");
 
    if(total.value == "")
    {
        grandTotal.value = "";
        return;
    }
 
    grandTotal.value = total.value * 1 + delivery.value * 1;
}
 
function showButton()
{
    var agree = document.getElementById("agree");
 
    if(agree.checked)
    {
        document.getElementById("submitBtn").style.display = "block";
    }
    else
    {
        document.getElementById("submitBtn").style.display = "none";
    }
}
 
function validateForm()
{
    var address = document.getElementById("address");
 
     document.getElementById("address_error").innerHTML ="";
 
    if(address.value.length < 10)
    {
        document.getElementById("address_error").innerHTML =
        "Please enter your full shipping address.";
        return false;
    }
 
    alert("Order Submitted Successfully");
    return true;
}