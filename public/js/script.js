document.addEventListener("DOMContentLoaded", () => {

    // Media query
    const mediaQuery = window.matchMedia("(max-width: 768px)");

    function isMobile() {
        return mediaQuery.matches;
    }


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

    if (chatList && !isMobile()) {
        chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
    }


    // Chat display
    const chatContacts = document.querySelector(".section-chat-conversations");
    const chatCards = document.querySelectorAll(".section-chat-conversations .chat-card");
    const chatContent = document.querySelector(".section-chat-content");
    const chatBack = document.getElementById("chat-back");

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


    // Book search
    function bookSearch() {
        const search = document.getElementById('search');
        const booksGrid = document.querySelector('.books-grid');
        let timeout;

        if (!search || !booksGrid) return;

        search.addEventListener('input', () => {
            // Annule la recherche précédente en cours (debouncing)
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                const query = search.value.trim();

                fetch(`index.php?action=searchBook&search=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(books => {
                        if (!books.length) {
                            booksGrid.innerHTML = '<p>Aucun livre trouvé.</p>';
                            return;
                        }

                        booksGrid.innerHTML = books.map(book => `
                            <a href="index.php?action=book&id=${book.id}" class="book-card">
                                <article>
                                    <figure>
                                        <img src="images/books/${book.cover_image}" alt="" class="img-cover">
                                    </figure>
                                    <div class="text-ellipsis book-info">
                                        <h3>${book.title}</h3>
                                        <h4>${book.author}</h4>
                                        <p class="text-caption">Vendu par : ${book.user_nickname || 'Inconnu'}</p>
                                    </div>
                                </article>
                            </a>
                        `).join('');
                    })
                    .catch(() => {
                        booksGrid.innerHTML = '<p>Erreur lors de la recherche, merci de réessayer plus tard.</p>';
                    });
            }, 300);
        });
    }

    bookSearch();
});