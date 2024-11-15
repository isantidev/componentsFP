document.addEventListener("DOMContentLoaded", async () => {
    const navLinks = document.querySelectorAll("a[data-document]");
    const contentDiv = document.getElementById("content");
    const defaultDocument = "../frontend/stocksoft.php";

    const loadDocument = async (documentPath) => {
        try {
            const response = await fetch(documentPath);
            if (!response.ok) {
                throw new Error(`Fallo al cargar ${documentPath}: ${response}`);
            }
            const content = await response.text();
            contentDiv.innerHTML = content;
        } catch (error) {
            contentDiv.innerHTML = `<p>${error.message}</p>`;
        }
    };

    await loadDocument(defaultDocument);

    navLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const documentPath = link.getAttribute("data-document");
            loadDocument(documentPath);
        });
    });
});
