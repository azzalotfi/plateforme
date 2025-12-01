document.addEventListener('DOMContentLoaded', function () {
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message-input');
    const chatHistory = document.getElementById('chat-history');
    const emptyState = document.getElementById('empty-state');
    const clearHistoryButton = document.getElementById('clear-history-button');
    const sendButton = document.getElementById('send-button');

    // Load chat history from localStorage
    loadChatHistory();

    // Handle form submission
    chatForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const message = messageInput.value.trim();
        if (!message) return;

        // Disable input while processing
        setInputState(false);

        // Add user message to chat
        addMessage(message, 'user');

        // Clear input
        messageInput.value = '';

        // Show typing indicator
        const typingIndicator = addTypingIndicator();

        try {
            // Send message to API
            const response = await fetch('/api/ai-assistant/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            // Remove typing indicator
            typingIndicator.remove();

            if (data.success) {
                // Add AI response to chat
                addMessage(data.response, 'ai');
            } else {
                // Show error message
                addMessage(
                    `<p class="text-red-600">Erreur: ${data.error || 'Une erreur est survenue'}</p>`,
                    'ai'
                );
            }
        } catch (error) {
            console.error('Error:', error);
            typingIndicator.remove();
            addMessage(
                '<p class="text-red-600">Erreur de connexion. Veuillez réessayer.</p>',
                'ai'
            );
        } finally {
            // Re-enable input
            setInputState(true);
            messageInput.focus();
        }
    });

    // Clear history button
    clearHistoryButton.addEventListener('click', function () {
        if (confirm('Êtes-vous sûr de vouloir effacer l\'historique ?')) {
            clearChatHistory();
        }
    });

    function addMessage(content, type) {
        // Hide empty state
        if (emptyState) {
            emptyState.style.display = 'none';
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}-message mb-4 animate-fade-in`;

        if (type === 'user') {
            messageDiv.innerHTML = `
                <div class="flex justify-end">
                    <div class="max-w-3/4 bg-blue-600 text-white rounded-lg px-4 py-3 shadow">
                        <p class="text-sm">${escapeHtml(content)}</p>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex justify-start">
                    <div class="max-w-3/4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow">
                        <div class="ai-response text-sm text-gray-800">${content}</div>
                    </div>
                </div>
            `;
        }

        chatHistory.appendChild(messageDiv);
        chatHistory.scrollTop = chatHistory.scrollHeight;

        // Save to localStorage
        saveChatHistory();
    }

    function addTypingIndicator() {
        const indicator = document.createElement('div');
        indicator.className = 'typing-indicator mb-4';
        indicator.innerHTML = `
            <div class="flex justify-start">
                <div class="bg-white border border-gray-200 rounded-lg px-4 py-3 shadow">
                    <div class="flex gap-1">
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    </div>
                </div>
            </div>
        `;
        chatHistory.appendChild(indicator);
        chatHistory.scrollTop = chatHistory.scrollHeight;
        return indicator;
    }

    function setInputState(enabled) {
        messageInput.disabled = !enabled;
        sendButton.disabled = !enabled;

        if (enabled) {
            sendButton.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            sendButton.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    function saveChatHistory() {
        const messages = [];
        chatHistory.querySelectorAll('.message').forEach(msg => {
            const isUser = msg.classList.contains('user-message');
            const content = isUser
                ? msg.querySelector('p').textContent
                : msg.querySelector('.ai-response').innerHTML;
            messages.push({ type: isUser ? 'user' : 'ai', content });
        });
        localStorage.setItem('ai_chat_history', JSON.stringify(messages));
    }

    function loadChatHistory() {
        const saved = localStorage.getItem('ai_chat_history');
        if (saved) {
            try {
                const messages = JSON.parse(saved);
                messages.forEach(msg => {
                    addMessageWithoutSave(msg.content, msg.type);
                });
            } catch (e) {
                console.error('Error loading chat history:', e);
            }
        }
    }

    function addMessageWithoutSave(content, type) {
        if (emptyState) {
            emptyState.style.display = 'none';
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}-message mb-4`;

        if (type === 'user') {
            messageDiv.innerHTML = `
                <div class="flex justify-end">
                    <div class="max-w-3/4 bg-blue-600 text-white rounded-lg px-4 py-3 shadow">
                        <p class="text-sm">${escapeHtml(content)}</p>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex justify-start">
                    <div class="max-w-3/4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow">
                        <div class="ai-response text-sm text-gray-800">${content}</div>
                    </div>
                </div>
            `;
        }

        chatHistory.appendChild(messageDiv);
    }

    function clearChatHistory() {
        chatHistory.innerHTML = `
            <div class="text-center text-gray-500 py-8" id="empty-state">
                <i class="bi bi-chat-dots text-6xl mb-4"></i>
                <p data-i18n="ai_start_conversation">Commencez une conversation avec l'assistant</p>
            </div>
        `;
        localStorage.removeItem('ai_chat_history');
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
