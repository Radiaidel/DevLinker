



var sendButton = document.getElementById("send-message-btn");
    sendButton.addEventListener("click", function(event) {
        var messageContent = document.getElementById("message-input").value;
        var conversation = this.getAttribute("data-conversation");

        fetch('/messages/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    conversation_id: conversation,
                    content: messageContent
                })
            })
            .then(response => {
                if (response.ok) {
                    console.log('Message sent successfully');
                } else {
                    console.error('Failed to send message');
                }
            })
            .catch(error => console.error('Error:', error));
    });