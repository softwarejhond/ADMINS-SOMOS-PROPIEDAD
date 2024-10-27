document.addEventListener("DOMContentLoaded", main);

function main() {
  document.addEventListener("click", handleBgClick);

  const menuContainer = document.querySelector("#menu-container");
  const isMenuClosedAttrName = "data-is-closed";

  const menuBtn = document.querySelector("#menu-btn");
  const menu = document.querySelector("#menu");

  menuBtn.addEventListener("click", toggleMenu);

  function toggleMenu(e) {
    const isMenuClosed = menuContainer.getAttribute(isMenuClosedAttrName);
    if (isMenuClosed === "true") {
      openMenu();
    } else {
      closeMenu();
    }
  }

  function openMenu() {
    menu.scrollTop = 0;
    menuContainer.setAttribute(isMenuClosedAttrName, "false");
    // Se asegura de que el body pueda desplazarse
    document.body.style.overflow = "visible";
  }

  function closeMenu() {
    menuContainer.setAttribute(isMenuClosedAttrName, "true");
    // Si quieres bloquear el scroll cuando el menú está cerrado, puedes añadirlo aquí
    // document.body.style.overflow = "hidden";
  }

  // Click en el fondo cierra el menú.
  function handleBgClick(e) {
    const wentEventNotThroughMenu = !e.path.includes(menu);
    const wentEventNotThroughMenuBtn = !e.path.includes(menuBtn);
    if (wentEventNotThroughMenu && wentEventNotThroughMenuBtn) {
      closeMenu();
    }
  }
}
