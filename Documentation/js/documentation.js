document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".nav-link");
  const markdownContainer = document.getElementById("markdown-container");

  // Función para cargar y renderizar el Markdown
  const loadMarkdown = async (filePath) => {
    try {
      // Petición al archivo Markdown
      const response = await fetch(filePath);
      if (!response.ok) {
        throw new Error(`Error al cargar el archivo: ${response.statusText}`);
      }
      const markdownText = await response.text();

      // Convertir Markdown a HTML y mostrarlo
      markdownContainer.innerHTML = marked.parse(markdownText);
    } catch (error) {
      console.error(error);
      markdownContainer.innerHTML = `<p class="text-red-500">No se pudo cargar la documentación.</p>`;
    }
  };

  // Manejador de eventos para los clics en los enlaces
  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();

      // Remover la clase 'active' de todos los enlaces
      navLinks.forEach((l) =>
        l.classList.remove(
          "bg-gray-800",
          "text-gray-100",
          "font-semibold",
          "border-l-2",
          "border-blue-500"
        )
      );
      // Agregar la clase 'active' al enlace clickeado
      e.currentTarget.classList.add(
        "bg-gray-800",
        "text-gray-100",
        "font-semibold",
        "border-l-2",
        "border-blue-500"
      );

      const filePath = e.currentTarget.getAttribute("data-path");
      loadMarkdown(filePath);
    });
  });

  // Cargar el archivo inicial al cargar la página
  const initialPath = document
    .querySelector(".nav-link[data-path]")
    .getAttribute("data-path");
  loadMarkdown(initialPath);
});
