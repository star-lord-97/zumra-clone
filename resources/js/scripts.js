let mobileMenuIcon = document.querySelector("#mobile-menu-icon");
let mobileMenuModal = document.querySelector("#mobile-nav-modal");

mobileMenuIcon.addEventListener("click", () => {
    mobileMenuModal.classList.toggle("hidden");
});

mobileMenuModal.addEventListener("click", () => {
    mobileMenuModal.classList.toggle("hidden");
});
