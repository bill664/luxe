// LuxeMarket - Main JavaScript File

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive components
    initializeTabs();
    initializeMessaging();
    initializeProductGallery();
    initializeFilters();
    initializeAdminActions();
    initializeSellerDashboard();
});

// Tab functionality for product details and admin panel
function initializeTabs() {
    const tabs = document.querySelectorAll('.tab');
    if (tabs.length === 0) return;
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Here you would normally show/hide the corresponding content
            // For demo purposes, we're just changing the tab styling
            console.log(`Tab clicked: ${this.textContent.trim()}`);
        });
    });
}

// Messaging system functionality
function initializeMessaging() {
    // Contact selection functionality
    const contacts = document.querySelectorAll('.contact');
    if (contacts.length === 0) return;
    
    contacts.forEach(contact => {
        contact.addEventListener('click', function() {
            // Remove active class from all contacts
            contacts.forEach(c => c.classList.remove('active'));
            // Add active class to clicked contact
            this.classList.add('active');
            
            // In a real application, this would load the conversation with this contact
            const contactName = this.querySelector('.contact-details h4').textContent;
            console.log(`Loading conversation with: ${contactName}`);
        });
    });

    // Message sending functionality
    const chatInputs = document.querySelectorAll('.chat-input input');
    const sendButtons = document.querySelectorAll('.chat-input button');
    
    if (chatInputs.length === 0 || sendButtons.length === 0) return;
    
    for (let i = 0; i < chatInputs.length; i++) {
        const input = chatInputs[i];
        const button = sendButtons[i];
        const messagesContainer = input.closest('.chat-area').querySelector('.chat-messages');
        
        function sendMessage() {
            const messageText = input.value.trim();
            if (messageText) {
                // Create new message element
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', 'sent');
                messageElement.innerHTML = `<p>${messageText}</p>`;
                
                // Add to chat messages
                messagesContainer.appendChild(messageElement);
                
                // Clear input
                input.value = '';
                
                // Scroll to bottom
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                // Simulate a response after a delay (for demo purposes)
                setTimeout(() => {
                    simulateResponse(messagesContainer);
                }, 1000);
            }
        }
        
        // Send message on button click
        button.addEventListener('click', sendMessage);
        
        // Send message on Enter key
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }
}

// Simulate receiving a message (for demo purposes)
function simulateResponse(messagesContainer) {
    const responses = [
        "Thank you for your message! How can I help you further?",
        "I appreciate your interest. Would you like more information?",
        "That's a great question. Let me check and get back to you.",
        "Yes, that's available. Would you like to proceed with the purchase?",
        "We offer worldwide shipping. Delivery to your location would take 3-5 business days."
    ];
    
    const randomResponse = responses[Math.floor(Math.random() * responses.length)];
    
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', 'received');
    messageElement.innerHTML = `<p>${randomResponse}</p>`;
    
    messagesContainer.appendChild(messageElement);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

// Product gallery functionality
function initializeProductGallery() {
    const thumbnails = document.querySelectorAll('.product-detail .thumbnail');
    if (thumbnails.length === 0) return;
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // In a real application, this would change the main product image
            console.log('Thumbnail clicked, changing main image');
        });
    });
}

// Filter functionality for browse page
function initializeFilters() {
    const filterCheckboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
    const priceRangeSlider = document.querySelector('.sidebar input[type="range"]');
    const filterButton = document.querySelector('.sidebar .btn-primary');
    
    if (!filterButton) return;
    
    filterButton.addEventListener('click', function() {
        console.log('Applying filters...');
        // In a real application, this would filter the products based on selected criteria
    });
}

// Admin panel actions
function initializeAdminActions() {
    const adminButtons = document.querySelectorAll('.admin-table .btn');
    if (adminButtons.length === 0) return;
    
    adminButtons.forEach(button => {
        button.addEventListener('click', function() {
            const action = this.textContent.trim();
            const row = this.closest('tr');
            const item = row.cells[0].textContent;
            
            console.log(`${action} action on: ${item}`);
            
            // For demo purposes, show confirmation for remove/suspend actions
            if (action === 'Remove' || action === 'Suspend' || action === 'Ban') {
                if (confirm(`Are you sure you want to ${action.toLowerCase()} ${item}?`)) {
                    console.log(`${action} confirmed for ${item}`);
                    // In a real application, this would send a request to the server
                }
            }
        });
    });
}

// Seller dashboard functionality
function initializeSellerDashboard() {
    const addProductButton = document.querySelector('.dashboard-header .btn-primary');
    if (!addProductButton) return;
    
    addProductButton.addEventListener('click', function() {
        console.log('Navigating to add product page...');
        // In a real application, this would navigate to the add product page
    });
}

// Search functionality
const searchForm = document.querySelector('.search-bar');
if (searchForm) {
    const searchInput = searchForm.querySelector('input');
    const searchButton = searchForm.querySelector('button');
    
    searchButton.addEventListener('click', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        if (query) {
            console.log(`Searching for: ${query}`);
            // In a real application, this would navigate to search results page
            window.location.href = `luxe-browse.html?search=${encodeURIComponent(query)}`;
        }
    });
    
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchButton.click();
        }
    });
}

// Subscription plan selection
const pricingCards = document.querySelectorAll('.pricing-card');
if (pricingCards.length > 0) {
    pricingCards.forEach(card => {
        card.addEventListener('click', function() {
            const plan = this.querySelector('h3').textContent;
            console.log(`Selected plan: ${plan}`);
            // Highlight the selected plan
            pricingCards.forEach(c => c.classList.remove('popular'));
            this.classList.add('popular');
        });
    });
}

// Product quantity selector
const quantityInput = document.querySelector('input[type="number"]');
if (quantityInput) {
    quantityInput.addEventListener('change', function() {
        if (this.value < 1) this.value = 1;
        console.log(`Quantity updated: ${this.value}`);
    });
}

// Add to cart functionality
const addToCartButton = document.querySelector('.btn-primary i.fa-shopping-cart')?.parentElement;
if (addToCartButton) {
    addToCartButton.addEventListener('click', function() {
        const productTitle = document.querySelector('h1').textContent;
        const quantity = document.querySelector('input[type="number"]')?.value || 1;
        
        console.log(`Added to cart: ${quantity} x ${productTitle}`);
        
        // Show confirmation message
        alert(`${quantity} x ${productTitle} added to your cart!`);
    });
}

// Wishlist functionality
const wishlistButton = document.querySelector('.btn-secondary i.fa-heart')?.parentElement;
if (wishlistButton) {
    wishlistButton.addEventListener('click', function() {
        const productTitle = document.querySelector('h1').textContent;
        
        console.log(`Added to wishlist: ${productTitle}`);
        
        // Toggle button style to indicate item is in wishlist
        this.innerHTML = '<i class="fas fa-heart" style="color: #e53e3e;"></i> In Wishlist';
        this.disabled = true;
        
        // Show confirmation message
        alert(`${productTitle} added to your wishlist!`);
    });
}