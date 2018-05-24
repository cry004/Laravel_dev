'use strict';

export default class SnapShareAction {
  static init(element) {
    const instance = new SnapShareAction(element);

    instance.action();
  }

  /**
   * Constructor
   *
   * @param Element element
   */
  constructor(element) {
    this.trigger = element;
    this.defaultClassName = element.className;
    this.displayTarget = element.querySelector('.js-ShareList');

    // create fixed scope handler ( for add / remove event easily )
    this.closer = this.hide.bind(this);
  }

  /**
   * Setup the actions
   *
   * @private
   */
  action() {
    this.trigger.addEventListener('click', this);

    // cancel bubbling event on sharelist clicked
    this.displayTarget.addEventListener('click', evt => evt.stopPropagation());
  }

  /**
   * Objective event handler
   *
   * @param MouseEvent evt
   * @return void
   */
  handleEvent(evt) {
    evt.stopPropagation();

    // check trigger has displayed flag className.
    // Element.classList not supported on some browsers...
    if (
      (' ' + this.trigger.className + ' ').indexOf(' Snap-Share--open ') === -1
    ) {
      // attach the class
      this.show();
    } else {
      this.hide();
    }
  }

  /**
   * Show the display target
   *
   * @public
   */
  show() {
    // attach the class
    this.trigger.className = this.defaultClassName + ' Snap-Share--open';

    // friendly UX, close sharelist on other document clicked.
    // Note that this event works one time only so UI performance, memory leak.
    document.addEventListener('click', this.closer);
  }

  /**
   * Hide the display target
   *
   * @public
   */
  hide() {
    // remove the class
    this.trigger.className = this.defaultClassName;

    // try to remove once event
    try {
      document.removeEventListener('click', this.closer);
    } catch (e) {}
  }
}
