/**
 * Ben Olson
 * Date:
 * This Javascript file...
 *
 */
"use strict";

(function() {

  /**
   * Add a function that will be called when the window is loaded.
   */
  window.addEventListener("load", init);

  /**
   * adds event listeners to certain user inputs
   */
  function init() {
    document.addEventListener('scroll', debounceFrame(storeScroll), { passive: true });
    storeScroll();
  }

  function storeScroll() {
    document.documentElement.dataset.scroll = window.scrollY;
  }

  /**
   * Debounces frame-related events by only triggering on the beginning of the animation.
   * @param {Object} fn - function with variable parameters.
   * @returns {Object} function that cancels definied frames and requests new ones.
   */
  function debounceFrame(fn) {
    let frame;

    return (...params) => {
      if (frame) {
        cancelAnimationFrame(frame);
      }
      frame = requestAnimationFrame(() => {
        fn(...params);
      });
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
