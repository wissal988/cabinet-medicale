const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

function toggleServices() {
            var categorieServiceSelect = document.getElementById("categorie_service");
            var medicalServicesSelect = document.getElementById("Medical_Services");
            var paramedicalServicesSelect = document.getElementById("Paramedical_Services");

            if (categorieServiceSelect.value === "Medical") {
                medicalServicesSelect.style.display = "block";
                paramedicalServicesSelect.style.display = "none";
            } else if (categorieServiceSelect.value === "Paramedical") {
                medicalServicesSelect.style.display = "none";
                paramedicalServicesSelect.style.display = "block";
            } else {
                medicalServicesSelect.style.display = "none";
                paramedicalServicesSelect.style.display = "none";
            }
        }

        // Assurez-vous que la fonction est appelée lors du chargement initial pour définir l'état initial
        toggleServices();