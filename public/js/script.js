document.addEventListener("DOMContentLoaded", () => {
    // Global
    const params = new URLSearchParams(window.location.search);

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
    const chatContent = document.querySelector(".section-chat-content");
    const chatBack = document.getElementById("chat-back");

    function showChatContent() {
        chatContacts.classList.add("hidden");
        chatContent.classList.add("visible");
    }

    function showChatContacts() {
        chatContacts.classList.remove("hidden");
        chatContent.classList.remove("visible");
    }

    function chatDisplay() {
        if (!isMobile() || params.get("id") === null) {
            showChatContacts();
        } else {
            showChatContent();
        }
    }

    if (chatContacts && chatContent) {
        if (chatBack) {
            chatBack.addEventListener("click", () => {
                if (isMobile()) {
                    showChatContacts();
                }
            });
        }

        mediaQuery.addEventListener("change", () => {
            chatDisplay();
        });

        chatDisplay();
    }


    // Book search
    function bookSearch() {
        const search = document.getElementById("search");
        const booksGrid = document.querySelector(".books-grid");
        let timeout;

        if (!search || !booksGrid) return;

        search.addEventListener("input", () => {
            // Annule la recherche précédente en cours (debouncing)
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                const query = search.value.trim();

                fetch(`index.php?action=searchBook&search=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(books => {
                        if (!books.length) {
                            booksGrid.innerHTML = "<p>Aucun livre trouvé.</p>";
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
                        `).join("");
                    })
                    .catch(() => {
                        booksGrid.innerHTML = "<p>Erreur lors de la recherche, merci de réessayer plus tard.</p>";
                    });
            }, 300);
        });
    }

    bookSearch();


    // Cover update
    const photoImg = document.querySelector(".section-edit-photo img");
    const coverUpdate = document.getElementById("cover-update");
    const coverImage = document.getElementById("cover-image");
    const textError = document.querySelector(".text-error");

    if (coverUpdate && coverImage) {
        coverUpdate.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                coverUpdate.click();
            }
        });

        coverImage.addEventListener("change", () => {
            const file = coverImage.files[0];

            if (file) {
                const types = ["image/jpeg", "image/png", "image/webp"];

                if (!types.includes(file.type)) {
                    textError.textContent = "Les formats d'image autorisés sont JPEG, PNG, WEBP.";
                    coverImage.value = "";
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    textError.textContent = "La taille de l'image ne doit pas dépasser 2 Mo.";
                    coverImage.value = "";
                    return;
                }

                const preview = new FileReader();

                preview.onload = (e) => {
                    photoImg.setAttribute("src", e.target.result);
                    textError.textContent = "";
                };

                preview.readAsDataURL(file);
            }
        });
    }


    // Avatar update
    const avatarUpdate = document.getElementById("avatar-update");
    const avatar = document.getElementById("avatar");

    if (avatarUpdate && avatar) {
        avatarUpdate.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                avatarUpdate.click();
            }
        });

        avatar.addEventListener("change", () => {
            if (avatar.files.length) {
                document.querySelector(".section-account-profile > form").submit();
            }
        });
    }

    if (params.has("successAvatar")) {
        const profileImg = document.querySelector(".section-account-profile > figure > img");

        if (profileImg) {
            const src = profileImg.getAttribute("src").split("?")[0];
            profileImg.setAttribute("src", src + "?v=" + new Date().getTime());
        }
    }


    // Link delete
    const linkDelete = document.querySelectorAll(".link-delete");

    if (linkDelete.length) {
        linkDelete.forEach(link => {
            link.addEventListener("click", (e) => {
                const message = link.getAttribute("data-confirm") || "Confirmez-vous la suppression ?";

                if (!confirm(message)) {
                    e.preventDefault();
                }
            });
        });
    }
});