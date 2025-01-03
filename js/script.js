document.addEventListener("DOMContentLoaded", () => {
    const ctaButton = document.getElementById("cta-button");
    const navMain = document.querySelector(".nav-main");
    const bannerSection = document.getElementById("banner");

    // Check if it's the index page
  const isIndexPage =
  window.location.pathname === "/" || 
  window.location.pathname === "/index.php" || 
  window.location.pathname.includes("index") || 
  window.location.pathname === "/localhost/blackdimond/" || 
  window.location.pathname === "/localhost/index.php";
// Function to handle visibility of the CTA button
    const updateCTAButtonVisibility = () => {
        if (isIndexPage && bannerSection) {
            const bannerRect = bannerSection.getBoundingClientRect();
            const isInBannerSection = bannerRect.bottom > 0 && bannerRect.top < window.innerHeight;

            if (isInBannerSection) {
                ctaButton.style.display = "none";
            } else {
                ctaButton.style.display = "block";
            }
        } else {
            // Always show the CTA button on non-index pages
            ctaButton.style.display = "block";
        }
    };

    // Initially hide the CTA button only for the index page
    if (isIndexPage) {
        ctaButton.style.display = "none";
    }

    // Call the function initially to handle page load
    updateCTAButtonVisibility();

    // Update button visibility on scroll only for the index page
    if (isIndexPage) {
        document.addEventListener("scroll", updateCTAButtonVisibility);
    }

    // Simulate a delay or condition to center the nav
    setTimeout(() => {
        ctaButton.classList.add("show"); // Add the 'show' class for animation
        navMain.classList.add("center"); // Move navbar items to the center
    }, 1000); // Adjust delay as needed (1 second here)
});


