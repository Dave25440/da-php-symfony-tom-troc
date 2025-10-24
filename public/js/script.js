document.addEventListener("DOMContentLoaded", () => {

    // Toggle menu
    const toggle = document.getElementById("menu-toggle");
    const nav = document.querySelector(".main-nav > ul");

    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("visible");
            toggle.classList.toggle("active");
        });
    }


    // Chat scroll
    const chatList = document.querySelector(".section-chat-messages > ul");

    if (chatList) {
        chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
    }


    // Chat display
    const chatContacts = document.querySelector(".section-chat-conversations");
    const chatCards = document.querySelectorAll(".section-chat-conversations .chat-card");
    const chatContent = document.querySelector(".section-chat-content");
    const chatBack = document.getElementById("chat-back");
    const mediaQuery = window.matchMedia("(max-width: 768px)");

    function isMobile() {
        return mediaQuery.matches;
    }

    function chatToggle() {
        if (isMobile()) {
            chatContacts.classList.toggle("hidden");
            chatContent.classList.toggle("visible");
        }
    }

    if (chatContacts && chatCards.length && chatContent) {
        chatCards.forEach(card => {
            card.addEventListener("click", chatToggle);
        });

        if (chatBack) {
            chatBack.addEventListener("click", chatToggle);
        }

        mediaQuery.addEventListener("change", (e) => {
            if (!e.matches) {
                chatContacts.classList.remove("hidden");
                chatContent.classList.remove("visible");
            }
        });
    }
});