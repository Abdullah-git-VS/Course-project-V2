

// here start js code for order dynamic steps :
showStep(1);
// Function to show the steps of the process


const orderData={
    vehicle:'',
    product:'',
    quantity:'',
    destination:''
}

 let selectedVehicle = null;
 let selectedProductCard = null;

function showStep(steps) {

    const content = document.getElementById("content");

    switch (steps){
        case 1:
            content.innerHTML = `
        <h2>Select Transport Vehicle</h2>
        <div class="icons">
          <div class="icon-item" onclick="selectVehicle('Car', this)">
            <i class="fas fa-car fa-3x"></i>
              <h3>Car</h3>
          </div>
          <div class="icon-item" onclick="selectVehicle('Truck', this)">
            <i class="fas fa-truck fa-3x"></i>
            <h3>Truck</h3>
          </div>
          <div class="icon-item" onclick="selectVehicle('Plane', this)">
            <i class="fas fa-plane fa-3x"></i>
            <h3>Plane</h3>
          </div>
          <div class="icon-item" onclick="selectVehicle('Ship', this)">
            <i class="fas fa-ship fa-3x"></i>
            <h3>Ship</h3>
          </div>
        </div>
        <br>
        <button onclick="saveVehicle()">Next</button>
            `;
            break;
        case 2:
            content.innerHTML =`
               <h2>Choose your your product </h2>
                <div class="icons">
                    <div class="icon-item" onclick="selectProduct('product1', this)">
                        <i class="fas fa-cow"></i> 
                        <h3>Cow</h3>
                    </div>
                    <div class="icon-item" onclick="selectProduct('product2', this)">
                        <i>🐪</i>
                        <h3>Camel</h3>
                    </div>
                    <div class="icon-item" onclick="selectProduct('producr3', this)">
                        <i>🐐</i>
                        <h3>goat</h3>
                    </div>
                    <div class="icon-item" onclick="selectProduct('product4', this)">
                        <i class="fa fa-horse"></i>
                        <h3>horse</h3>
                    </div>
                </div> <br>

                <div class="quantity">
                  <label for="quantity"><strong>Quantity:</strong></label>
                  <input type="number" id="quantity" min="1" placeholder="Enter quantity" style="margin-left: 10px;">
                </div> <br>

                <button onclick="saveProduct()">Next</button>

                
            `;
            break;
        case 3:
            content.innerHTML = `
                <h2>Enter Destination</h2>
                 <div class="case3">
                   <label><strong>Your City:</strong></label><br>
                   <input type="text" id="fromCity" placeholder="Enter your city">
                 </div>
                 <div class="input2">
                  <label><strong>Destination City:</strong></label><br>
                  <input type="text" id="toCity" placeholder="Enter destination city">
                 </div>
                <button onclick="saveDestination()">Next</button>
           `;
            break;
        case 4:
            content.innerHTML = ` 
            <h2>Order Summary</h2>
            <div class="summary">
              <p><strong>Vehicle:</strong> ${orderData.vehicle}</p>
              <p><strong>Product:</strong> ${orderData.product}</p>
              <p><strong>Quantity:</strong> ${orderData.quantity}</p>
              <p><strong>Destination:</strong> ${orderData.destination}</p>
            </div>

            <h3> confirm </h3>
            <form id="confirmForm" action="order.php" method="get">
              
              <input type="hidden" name="vehicle" value="${orderData.vehicle}">
              <input type="hidden" name="product" value="${orderData.product}">
              <input type="hidden" name="quantity" value="${orderData.quantity}">
              <input type="hidden" name="destination" value="${orderData.destination}">
              <button type="submit" name="submit2">Confirm Order</button>
            </form>
            
            `;
            break;
       
    }
}


function selectVehicle(vehicle, element) {
    orderData.vehicle = vehicle;
  
    if (selectedVehicleCard) {
      selectedVehicleCard.classList.remove("selected");
    }
    selectedVehicleCard = element;
    selectedVehicleCard.classList.add("selected");
  }
  
  function saveVehicle() {
    if (orderData.vehicle) {
      showStep(2);
    } else {
      alert("Please select a vehicle.");
    }
  }

  
function selectProduct(product, element) {
    orderData.product = product;
  
    if (selectedProductCard) {
      selectedProductCard.classList.remove("selected");
    }
    selectedProductCard = element;
    selectedProductCard.classList.add("selected");
  }

  function saveProduct() {
    const quantityInput = document.getElementById("quantity");
    const quantity = quantityInput ? quantityInput.value.trim() : '';
  
    if (!orderData.product) {
      alert("Please select a product.");
      return;
    }
  
    if (!quantity || isNaN(quantity) || Number(quantity) < 1) {
      alert("Please enter a valid quantity.");
      return;
    }
  
    orderData.quantity = quantity;
    showStep(3);
  }


  function saveDestination() {
    const fromCity = document.getElementById("fromCity").value.trim();
    const toCity = document.getElementById("toCity").value.trim();
  
    if (!fromCity || !toCity) {
      alert("Please enter both cities.");
      return;
    }
  
    orderData.destination = `${fromCity} to ${toCity}`;
    showStep(4);
  }


  function submitOrder(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const form = document.getElementById("confirmForm");
    const formData = new FormData(form);

    // Extract form data
    const name = formData.get("name");
    const email = formData.get("email");
    const vehicle = formData.get("vehicle");
    const product = formData.get("product");
    const quantity = formData.get("quantity");
    const destination = formData.get("destination");

    // Display confirmation message
    alert(`Order confirmed!\n\nName: ${name}\nEmail: ${email}\nVehicle: ${vehicle}\nProduct: ${product}\nQuantity: ${quantity}\nDestination: ${destination}`);

    // Optionally reset the form and restart the process
    // form.reset();
    // showStep(1); // Restart the process
}

//end of js code for order 