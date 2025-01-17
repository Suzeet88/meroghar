
document.addEventListener('DOMContentLoaded' , function(){

    const propertyContainer = document.getElementById("propertyContainer");
    const properties = JSON.parse(localStorage.getItem("properties")) || [];
    
    properties.forEach(property => {
        const card = document.createElement("div");
        card.classList.add("property-card");
    
        // Loop through all property images (if there are multiple images)
        const imagesHTML = property.propertyImages.map(imageBase64 => {
            return `<div class="property-box-img">
                        <img src="${imageBase64}" alt="property for sell/rent">
                    </div>`;
        }).join("");  // Join all images (if multiple) into one string
    
        card.innerHTML = `
             <div class="property-box" >
                     <span class="status">${property.status}</span>
                     ${imagesHTML}
                  <div class="property-box-content flex">
                          <div class="property-address flex align-items-center flex-gap-icons">
                    <ion-icon name="location-outline"></ion-icon>
                    <p>${property.location}</p>
                   </div>
                      
                    <div class="property-name flex justify-content align-items-center">
                        <div class="sqaure-feet flex flex-gap-icons align-items-center">
                            <ion-icon name="person-outline" class="property-icons"></ion-icon>
                            <p>${property.ownerName}</p>
                           </div>
    
                           <div class="sqaure-feet flex flex-gap-icons align-items-center">
                            <ion-icon name="home-outline" class="property-icons"></ion-icon>
                            <p>${property.id}</p>
                           </div>   
            
                    </div>
    
                       <div class="property-details flex flex-gap align-items-center">
                           <div class="sqaure-feet flex flex-gap-icons align-items-center">
                            <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                             <p>${property.squareFeet} sqf</p>
                           </div>
    
                           <div class="beds flex flex-gap-icons align-items-center">
                            <ion-icon name="cube-outline" class="property-icons"></ion-icon>
                            <p>${property.bedrooms} Beds</p>
                           </div>
    
                            <div class="baths flex flex-gap-icons align-items-center">
                                <ion-icon name="accessibility-outline" class="property-icons"></ion-icon>
                                <p>${property.baths} Baths</p>
                            </div>
    
                       </div>
                       
                       <div class="property-owner flex justify-content align-items-center">
                        <p>$${property.price}</p>
                        <a href="agent.php" class="more-btn">Contact Agents</a>
                       </div>
                  </div>
             </div>
        `;
    
        // Adjusting display style for property container if not done already
        propertyContainer.style.display = 'grid';
        propertyContainer.style.gridTemplateColumns = '1fr 1fr 1fr';
        propertyContainer.style.gap = '3.2rem';
        propertyContainer.appendChild(card);
    });
    
      
})




function search() {
    let filter = document.getElementById('Property').value.toLowerCase();
    let propertyContainer = document.querySelector('#propertyContainer');
    let properties = Array.from(propertyContainer.getElementsByClassName('property-box'));

    // Separate matching and non-matching properties
    let matchingProperties = [];
    let nonMatchingProperties = [];

    properties.forEach(property => {
        let address = property.querySelector('.property-address'); 
        let value = address.innerHTML || address.innerText || address.textContent;

        if (value.toLowerCase().indexOf(filter) > -1) {
            matchingProperties.push(property);
            property.style.display = ""; // Ensure it's visible if it matches
        } else {
            nonMatchingProperties.push(property);
            property.style.display = "none"; // Hide non-matching properties
        }
    });

    // Clear the container and append matching properties first
    propertyContainer.innerHTML = "";
    matchingProperties.forEach(property => propertyContainer.appendChild(property));
    nonMatchingProperties.forEach(property => propertyContainer.appendChild(property));
}


















