import $ from 'jquery';

class Search {
    constructor() {
        this.openButton = $(".search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.resultsDiv = $("#search-overlay__result")
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
        this.events();
    }

    events () {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        this.isOverlayOpen = true;
        $("body").addClass("body-no-scroll");
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        this.isOverlayOpen = false;
        $("body").removeClass("body-no-scroll");
    }

    keyPressDispatcher(e) {
        if (e.keyCode === 83 && !this.isOverlayOpen && !$("input, textarea").is(":focus")) {
            this.openOverlay();
        }

        if (e.keyCode === 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    typingLogic(e) {
        if (this.searchField.val() !== this.previousValue) {
            clearTimeout(this.typingTimer);

            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }
        }
        this.previousValue = this.searchField.val();
    }

    getResults() {
        this.resultsDiv.html("Imagine real search results here...");
        this.isSpinnerVisible = false;
    }
}

export default Search