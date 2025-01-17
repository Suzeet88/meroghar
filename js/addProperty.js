


document.addEventListener('DOMContentLoaded' , function(){
    document.getElementById("propertyForm").addEventListener("submit", function(e) {
        e.preventDefault();
    
        // Get property details from the form
        const property = {
            id: document.getElementById("propertyId").value,
            price: document.getElementById("price").value,
            squareFeet: document.getElementById("squareFeet").value,
            bedrooms: document.getElementById("bedrooms").value,
            baths: document.getElementById("baths").value,
            location: document.getElementById("location").value,
            ownerName: document.getElementById("ownerName").value,
            status: document.getElementById("status").value,
            propertyImages: [] // Initialize as an empty array to store image data
        };
    
        const imageFiles = document.getElementById('propertyImages').files;
    
        // Function to convert images to Base64
        function convertImagesToBase64(files, callback) {
            let convertedImages = [];
            let processedFiles = 0;
    
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    // Push Base64 string to the array
                    convertedImages.push(event.target.result);
                    processedFiles++;
    
                    // Once all images are processed, execute the callback
                    if (processedFiles === files.length) {
                        callback(convertedImages);
                    }
                };
    
                // Read the file as Base64 string
                reader.readAsDataURL(files[i]);
            }
        }
    
        // Convert images and save the property data
        convertImagesToBase64(imageFiles, function(base64Images) {
            // Update propertyImages with the Base64 image strings
            property.propertyImages = base64Images;
    
            // Retrieve properties from localStorage and add the new property
            let properties = JSON.parse(localStorage.getItem("properties")) || [];
            properties.push(property);
            localStorage.setItem("properties", JSON.stringify(properties));
    
            // Display success message and navigate to the properties page
            alert("Property added successfully!");
            window.location.replace("property.php");
        });
    });
    
})

