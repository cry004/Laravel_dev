'use strict';

import SnapShareAction from './SnapShareAction';

class App {
  /**
   * Constructor
   */
  constructor() {
    const doc = document;

    // search module
    this.search = doc.querySelectorAll('.js-Search');

    // toggle keywords
    this.toggleKeyword = doc.querySelectorAll('.js-Toggle');

    // toggle navition close
    this.closeNav = doc.querySelector('.Page');

    // snap share toggle trigger
    this.snapShareTrigger = doc.querySelector('.js-ShareToggle');

    // fallback icons
    this.fallbackIcons = doc.querySelectorAll('.js-FallbackIcon');

    this.GotoApp = doc.querySelector('.GotoApp');

    this.OpenUser = doc.querySelector('.USermore');
    this.UserList = doc.querySelector('.LikeUserList');
  }

  /**
   * Initializer
   *
   * @public
   */
  init() {
    // setup search trigger
    [].forEach.call(this.search, form => {
      const action = form.action;
      const query = form.querySelector('input[type=text]');

      form.addEventListener('submit', evt => {
        evt.preventDefault();
        location.href = action + 'fw-' + encodeURIComponent(query.value) + '/';
      });
    });

    // setup toggle keyword ( for mobile device )
    [].forEach.call(this.toggleKeyword, node => {
      let label;
      if (node.tagName !== 'LABEL') {
        label = node.nextElementSibling.querySelector('label');
      } else {
        label = node;
      }

      label.normalize();

      const text = label.firstChild;
      label.addEventListener('click', () => {
        if (text.nodeValue === '閉じる') {
          text.nodeValue = 'すべて見る';
        } else {
          text.nodeValue = '閉じる';
        }
      });
    });
    //いいね user open
    this.OpenUser.addEventListener('click', () => {
      this.UserList.classList.remove('hidden');
      document.querySelector('body').style.height = '100vh';
      document.querySelector('body').style.overflow = 'hidden';
    });
    //いいね user close
    this.UserList.querySelector('.closer').addEventListener('click', () => {
      this.UserList.classList.add('hidden');
      document.querySelector('body').removeAttribute('style');
    });

    //setup click event to close navition ( for mobile device )
    this.closeNav.addEventListener('click', () => {
      const navTrigger = document.getElementById('navigation-trigger');
      navTrigger.checked = false;
    });

    // setup share toggle action
    if (this.snapShareTrigger) {
      SnapShareAction.init(this.snapShareTrigger);
    }

    // setup fallback icon image
    [].forEach.call(this.fallbackIcons, node => {
      // <img> tag only
      if (node.tagName !== 'IMG') {
        return;
      }

      node.addEventListener('error', () => {
        // guard to recursive call
        if (node.hasAttribute('data-handled')) {
          return;
        }
        node.src = node.getAttribute('data-fallbackimage');
        node.setAttribute('data-handled', 1);
      });
    });
    window.addEventListener('scroll', () => {
      let Applink_h = this.GotoApp.offsetHeight || this.closeNav.offsetHeight;
      if (window.pageYOffset >= Applink_h) {
        this.GotoApp.style.top = Applink_h * -1 + 'px';
        document.getElementById('pt').className = 'Pages';
        this.closeNav.style.marginTop = Applink_h + 50 + 'px'; //50 is $headerSmallHeight
      } else {
        this.GotoApp.style.top = '';
        document.getElementById('pt').className = 'Pages Appshow';
        this.closeNav.style.marginTop = '';
      }
    });
  }
}

(() => {
  const c = new App();
  c.init();
})();
