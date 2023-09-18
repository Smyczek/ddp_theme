import domReady from '@roots/sage/client/dom-ready';
// import '@fortawesome/fontawesome-free/js/fontawesome.js';
// import '@fortawesome/fontawesome-free/js/brands.js';
// import '@fortawesome/fontawesome-free/js/solid.js';
import { Offcanvas, Ripple, Collapse, Validation, Input, Select, initTE,  } from 'tw-elements'
import { twMerge } from 'tailwind-merge'
import { swiper } from './swiper.js'
import { photoSwipe } from './photo-swipe.js'

import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faLinkedin, faSquareFacebook, faInstagram } from '@fortawesome/free-brands-svg-icons';
library.add(faLinkedin, faSquareFacebook, faInstagram);
dom.watch();

/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    console.error(err);
  }

  initTE({ Offcanvas, Ripple });

  if (document.body.classList.contains('home')) {
    swiper();
    photoSwipe();
  }

  if (document.body.classList.contains('about')) {
    initTE({ Collapse });
  }

  if (document.body.classList.contains('quote')) {
    initTE({ Ripple, Validation, Input, Select }, { allowReinits: true });

    const formSubmitValidation = document.getElementById('validation-btn');
    const quoteForm = document.getElementById('quote-form');
    const InputFirstName = document.getElementById('first-name-input');
    const InputLastName = document.getElementById('last-name-input');
    const InputEmail = document.getElementById('email-input');
    const InputCompany = document.getElementById('company-input');
    const InputProductName = document.getElementById('project-name-input');
    const InputType = document.getElementById('type-of-photography-input');
    const InputDescription = document.getElementById('project-description-input');
    
    formSubmitValidation.addEventListener("click", (e) => {
      e.preventDefault();
      const isInputFirstNameValid = InputFirstName.getAttribute("data-te-validation-state") === 'valid';
      const isInputLastNameValid = InputLastName.getAttribute("data-te-validation-state") === 'valid';
      const isInputEmailValid = InputEmail.getAttribute("data-te-validation-state") === 'valid';
      const isInputCompanyValid = InputCompany.getAttribute("data-te-validation-state") === 'valid';
      const isInputProductNameValid = InputProductName.getAttribute("data-te-validation-state") === 'valid';
      const isInputTypeValid = InputType.getAttribute("data-te-validation-state") === 'valid';
      const isInputDescriptionValid = InputDescription.getAttribute("data-te-validation-state") === 'valid';

      if (isInputFirstNameValid && isInputLastNameValid && isInputEmailValid && isInputCompanyValid && isInputProductNameValid && isInputTypeValid && isInputDescriptionValid) {
        console.log('Quote form is valid.');
        quoteForm.submit();
      } else {
        console.log('Quote form is not valid.');
      }
    });
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
