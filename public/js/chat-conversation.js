// Chat conversation JavaScript
// Initialize conversation data from page
let conversationId;
let lastMessageId = 0;
let isPolling = true;

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    // Get conversation data from data attributes
    const chatContainer = document.querySelector('.chat-messages');
    if (chatContainer) {
        conversationId = chatContainer.dataset.conversationId;
        lastMessageId = parseInt(chatContainer.dataset.lastMessageId) || 0;
    }

    // Setup event listeners
    setupFormSubmit();
    setupTextareaResize();

    // Start chat functionality
    scrollToBottom();
    setTimeout(pollNewMessages, 3000);
});

// Auto-scroll to bottom
function scrollToBottom() {
    const messagesContainer = document.getElementById('chatMessages');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
}

// Setup form submit handler
function setupFormSubmit() {
    const form = document.getElementById('chatForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const input = document.getElementById('messageInput');
        const content = input.value.trim();

        if (!content) return;

        fetch(`/chat/conversation/${conversationId}/send`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `content=${encodeURIComponent(content)}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    input.value = '';
                    input.style.height = 'auto';
                    // Message will appear via polling
                }
            })
            .catch(error => console.error('Error:', error));
    });
}

// Setup auto-resize textarea
function setupTextareaResize() {
    const textarea = document.getElementById('messageInput');
    if (!textarea) return;

    textarea.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
}

// Poll for new messages
function pollNewMessages() {
    if (!isPolling) return;

    fetch(`/chat/conversation/${conversationId}/new-messages?lastId=${lastMessageId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.messages.length > 0) {
                const messagesContainer = document.getElementById('chatMessages');

                data.messages.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `message ${message.isMine ? 'message-mine' : 'message-theirs'}`;
                    messageDiv.setAttribute('data-message-id', message.id);

                    let deleteBtn = '';
                    if (message.isMine) {
                        deleteBtn = `
                            <span class="delete-message-btn" onclick="deleteMessage(${message.id})" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </span>
                        `;
                    }

                    messageDiv.innerHTML = `
                        <div class="message-bubble group">
                            <div class="message-content">${escapeHtml(message.content)}</div>
                            <div class="message-time">
                                ${formatTime(message.createdAt)}
                                ${deleteBtn}
                            </div>
                        </div>
                    `;

                    messagesContainer.appendChild(messageDiv);
                    lastMessageId = message.id;
                });

                scrollToBottom();
            }
        })
        .catch(error => console.error('Polling error:', error))
        .finally(() => {
            setTimeout(pollNewMessages, 3000); // Poll every 3 seconds
        });
}

// Delete message
window.deleteMessage = function (messageId) {
    if (!confirm('Voulez-vous vraiment supprimer ce message ?')) return;

    fetch(`/chat/message/${messageId}/delete`, {
        method: 'POST'
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const messageElement = document.querySelector(`.message[data-message-id="${messageId}"]`);
                if (messageElement) {
                    messageElement.remove();
                }
            } else {
                alert('Erreur lors de la suppression du message');
            }
        })
        .catch(error => console.error('Error:', error));
};

// Escape HTML to prevent XSS
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Format time for display
function formatTime(dateString) {
    const date = new Date(dateString);
    return date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
}

// Stop polling when leaving page
window.addEventListener('beforeunload', function () {
    isPolling = false;
});
