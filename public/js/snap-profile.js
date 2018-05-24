"use strict";


class SnapProfile {

    static make(baseNode) {
        if ( ! baseNode ) {
            return;
        }
        const instance = new SnapProfile(baseNode);
        instance.init();
    }

    constructor(baseNode) {
        this.node              = baseNode;
        this.background        = baseNode.querySelector(".js-ProfileBackground");
        this.isNeedFixedHeight = window.innerWidth <= 640;
    }

    init() {
        // check window size on media query threshould
        if ( this.isNeedFixedHeight ) {
            this.fixHeight();
        }

        window.addEventListener("resize", this);
    }

    fixHeight() {
        let height  = 0;
        const props = ["margin-top", "margin-bottom", "padding-top", "padding-bottom"];

        [].forEach.call(this.node.querySelectorAll(".js-FixedHeight"), (node) => {
            const css = window.getComputedStyle(node, null);
            props.forEach((p) => {
                height += parseInt(css.getPropertyValue(p), 10);
            });
            height += node.offsetHeight;
        });

        this.background.style.height = height + "px";
    }

    handleEvent(evt) {
        if ( evt.type !== "resize" ) {
            return;
        }

        if ( window.innerWidth <= 640 ) {
            this.isNeedFixedHeight = true;
            this.fixHeight();
            return;
        }

        this.isNeedFixedHeight       = false;
        this.background.style.height = "100%";
    }
}

(() => {
    SnapProfile.make(
        document.querySelector(".js-ProfileContent")
    );
})();
