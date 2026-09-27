function validateForm()
{
    var price = document.getElementById("price");
    var quantity = document.getElementById("quantity");
    var total = document.getElementById("total");

    if(quantity.value < 0)
    {
        document.getElementById("quantity_error").innerHTML =
        "Quantity cannot be negative";
        return false;
    }

    total.value = price.value * quantity.value;

    if(total.value <= 1000)
    {
        document.getElementById("total_error").innerHTML =
        "Total price must exceed 1000 BDT";
        return false;
    }

    alert("Item Selection Successful");
    return true;
}

function deliveryCharge()
{
    var delivery = document.getElementById("delivery");
    var charge = document.getElementById("charge");

    if(delivery.value == "50")
    {
        charge.value = "50 BDT";
    }
    else
    {
        charge.value = "100 BDT";
    }
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