document.getElementById("number").addEventListener("change", update_quantite);

function update_quantite(e) {
    // Get the value of the element with id "prix" and convert it to an integer
    // This is assumed to be the price of an item
    prix = parseInt(document.getElementById("prix").value); 


    // Get the element with id "totalChamp"
    // This is where the total value will be displayed
    totalChamp = document.getElementById("totalChamp");

     // Get the value of the element that triggered the event (i.e. the quantity input field)
    // and convert it to an integer
    quantite = parseInt(e.target.value);

    // Calculate the total value by multiplying the quantity by the price
    // Use toFixed(2) to format the result to 2 decimal places
    totalValue = (quantite * prix).toFixed(2);

   
// Update the text content of the totalChamp element to display the total value
    totalChamp.innerText = "Total : " + totalValue + " €";

    totalForm = document.getElementById("total"); // get the element with id total (assume you have an element with id "total"

    // Update the value of the totalForm element to the total value
    totalForm.value = totalValue;
}