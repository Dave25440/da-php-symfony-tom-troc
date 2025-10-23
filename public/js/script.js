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
});