/**
 * Ben Olson
 * Date:
 * Section AH: Valerie Remaker
 * This Javascript file...
 *
 */
"use strict";

const MQUERIES = [
  window.matchMedia('(max-width: 599px)'), // Mobile
  window.matchMedia('(min-width: 600px) and (max-width: 1224px)'), // Tablet
  window.matchMedia('(min-width: 1225px)') // Desktop
];

let mQuery;

(function() {

  /**
   * Add a function that will be called when the window is loaded.
   */
  window.addEventListener("load", init);

  /**
   * adds event listeners to certain user inputs
   */
  function init() {
    initSubMenu();
    handleMediaChange();
    for (let i = 0; i < MQUERIES.length; i++) {
      MQUERIES[i].addListener(handleMediaChange);
    }
    let flkty = new Flickity( '.carousel', {
      cellSelector: ".carousel-cell",
      wrapAround: false,
      autoPlay: 10000,
      dragThreshold: 10,
      lazyLoad: 2,
      cellAlign: 'left',
    });
    flkty.on( 'ready', hideHeaders(0));
    flkty.on( 'change', function(index) {
      hideHeaders(index);
    });
  }

  function hideHeaders(index) {
    let headers = qsa('.category-heading');
    for (let i = 0; i < headers.length; i++) {
      if (i == index) {
        headers[i].classList.remove('hidden');
      } else {
        headers[i].classList.add('hidden');
      }
    }
  }

  function initSubMenu() {
    let menus = Array.from(qsa('.sub-menu'));
    for (let i = 0; i < menus.length; i++) {
      let menu = menus[i];
      menu.parentNode.addEventListener('mouseover', function() {
        openSubMenu(menu);
      });
      menu.parentNode.addEventListener('mouseout', function() {
        closeSubMenu(menu);
      });
      menu.addEventListener('mouseout', function() {
        closeSubMenu(menu);
      });
      let children = Array.from(menu.children);
      for (let j = 0; j < children.length; j++) {
        children[j].classList.add('hidden');
      }
    }
  }

  function openSubMenu(menu) {
    let children = Array.from(menu.children);
    for (let i = 0; i < children.length; i++) {
      children[i].classList.remove('hidden');
    }
  }

  function closeSubMenu(menu) {
    let children = Array.from(menu.children);
    for (let i = 0; i < children.length; i++) {
      children[i].classList.add('hidden');
    }
  }

  function handleMediaChange() {
    for (let i = 0; i < MQUERIES.length; i++) {
      if (MQUERIES[i].matches && mQuery != i) {
        mQuery = i;
        hideWrap('.category-row');
      }
    }
  }

  function hideWrap(className) {
    let categories = qsa(className);
    if (mQuery == 1) {
      for (var i = 0; i < categories.length; i++) {
        if (categories[i].children.length > 3) {
          categories[i].lastElementChild.classList.add("hidden");
          // categories[i].lastElementChild.previousElementSibling.classList.add("hidden");
        }
      }
    } else {
      for (var i = 0; i < categories.length; i++) {
        categories[i].lastElementChild.classList.remove("hidden");
        // categories[i].lastElementChild.previousElementSibling.classList.remove("hidden");
      }
    }
  }


  /**
   * Returns the element that has the ID attribute with the specified value.
   * @param {string} idName - element ID
   * @returns {object} DOM object associated with id.
   */
  function id(idName) {
    return document.getElementById(idName);
  }

  /**
   * Returns the first element that matches the given CSS selector.
   * @param {string} selector - CSS query selector.
   * @returns {object} The first DOM object matching the query.
   */
  function qs(selector) {
    return document.querySelector(selector);
  }

  /**
   * Returns the array of elements that match the given CSS selector.
   * @param {string} selector - CSS query selector
   * @returns {object[]} array of DOM objects matching the query.
   */
  function qsa(selector) {
    return document.querySelectorAll(selector);
  }

  /**
   * Returns a new element with the given tag name.
   * @param {string} tagName - HTML tag name for new DOM element.
   * @returns {object} New DOM object for given HTML tag.
   */
  function gen(tagName) {
    return document.createElement(tagName);
  }

})();
