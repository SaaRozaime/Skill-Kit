@extends('layouts.master')

@section('title', 'Search Library')

@section('additional-styles')
.main-content {
    background-color: #f8f9fa;
    padding: 24px;
    display: flex;
    gap: 20px;
}

.left-section {
    width: 70%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.library-card {
    width: 100%;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 32px;
    border-radius: 16px;
    border: none;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    height: calc(100vh - 200px); /* Adjust based on your needs */
}

.search-section {
    display: flex;
    flex-direction: column;
    gap: 24px;
    height: 100%;
}

.search-header {
    text-align: center;
    margin-bottom: 24px;
    flex-shrink: 0;
}

.search-header h2 {
    color: #2d3436;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 8px;
}

.search-form {
    display: flex;
    flex-direction: column;
    gap: 16px;
    flex-shrink: 0;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 600;
    color: #2d3436;
    font-size: 16px;
}

select {
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

select:hover {
    border-color: #4CAF50;
}

select:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.1);
}

.module-content {
    background: #f8f9fa;
    padding: 24px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    margin-top: 20px;
    flex-grow: 1;
    overflow-y: auto;
    max-height: calc(100vh - 400px); /* Adjust based on your needs */
}

.module-content h3 {
    color: #2d3436;
    font-size: 20px;
    margin-bottom: 16px;
    font-weight: 600;
}

.module-content p {
    color: #636e72;
    line-height: 1.6;
    margin-bottom: 16px;
}

.module-content ul {
    list-style-type: disc;
    padding-left: 24px;
    margin-bottom: 16px;
}

.module-content li {
    color: #636e72;
    margin-bottom: 8px;
}

.right-section {
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-left: 1px solid #e0e0e0;
    padding-left: 24px;
    padding-right: 16px;
    margin-right: 16px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.notification-box {
    width: 100%;
    height: 100%;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 24px;
    border-radius: 16px;
    overflow-y: auto;
    border: none;
}

.notification-box h3 {
    color: #2d3436;
    margin-bottom: 20px;
    font-size: 20px;
    text-align: left;
    padding-bottom: 16px;
    border-bottom: 2px solid #f1f3f5;
    font-weight: 700;
}

.notification-item {
    background: #f8f9fa;
    padding: 16px;
    margin-bottom: 16px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
}

.notification-item:hover {
    background: #f1f3f5;
}

.message-actions {
    display: flex;
    gap: 12px;
    margin-top: 12px;
}

.read-button, .delete-button {
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
}

.read-button {
    background-color: #4CAF50;
    color: white;
}

.read-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.delete-button {
    background-color: #ff6b6b;
    color: white;
}

.delete-button:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
}

.no-messages {
    text-align: center;
    color: #636e72;
    padding: 32px;
    font-style: italic;
    font-size: 15px;
}
@endsection

@section('content')
<div class="main-content">
    <!-- Left Section -->
    <div class="left-section">
        <div class="library-card">
            <div class="search-section">
                <div class="search-header">
                    <h2>Search Library</h2>
                </div>

                <div class="search-form">
                    <div class="form-group">
                        <label for="module-select">Choose a Module:</label>
                        <select id="module-select" onchange="updateModule()">
                            <option value="">-- Select a module --</option>
                            <option value="module1">Introduction to Library System</option>
                            <option value="module2">Advanced Search Techniques</option>
                            <option value="module3">Digital Library Access</option>
                            <option value="module4">Citation and Referencing</option>
                        </select>
                    </div>
                </div>

                <div id="module-content" class="module-content">
                    <h3>Select a module to view its content</h3>
                    <p>Choose a module from the dropdown above to see detailed information about library resources and search techniques.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="notification-box">
            <h3>Received Messages</h3>
            @if($messages->count() > 0)
                @foreach($messages as $message)
                    <div class="notification-item {{ !$message->is_read ? 'unread' : '' }}" 
                         data-message-id="{{ $message->id }}">
                        <div class="message-sender">
                            From: {{ $message->sender->name }}
                        </div>
                        <div class="message-content">
                            {{ Str::limit($message->content, 100) }}
                        </div>
                        <div class="message-time">
                            {{ $message->created_at->format('M d, Y H:i') }}
                        </div>
                        <div class="message-actions">
                            <button class="read-button" onclick="openMessageModal({{ $message->id }}, '{{ $message->content }}')">Read</button>
                            <button class="delete-button" onclick="confirmDelete({{ $message->id }})">Delete</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-messages">
                    No messages received yet.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function updateModule() {
        const selectedModule = document.getElementById("module-select").value;
        const contentDiv = document.getElementById("module-content");
        
        const moduleData = {
            module1: `
                <h3>Introduction to Library System</h3>
                <p>Libraries are vital resources that provide access to books, journals, and digital content. Knowing how to navigate a library is essential for effective research.</p>
                
                <h4>Types of Libraries:</h4>
                <ul>
                    <li><strong>Public Libraries:</strong> Open to everyone, usually free of charge. Offer books, movies, computers, and sometimes internet.</li>
                    <li><strong>Academic Libraries:</strong> Found in universities, these provide resources for academic research.</li>
                    <li><strong>Special Libraries:</strong> Focus on specific fields, such as law or medicine, often with rare resources.</li>
                    <li><strong>Digital Libraries:</strong> Online repositories for e-books, academic papers, multimedia, and more. Provide global access.</li>
                </ul>
                
                <h4>Library Services:</h4>
                <p>Borrowing books, using reference sections, digital content access, research assistance, and access to online databases.</p>
                
                <h4>Library Layout:</h4>
                <p>Cataloging systems (e.g., Dewey Decimal, Library of Congress), reference sections, study areas, and digital resources.</p>
            `,
            module2: `
                <h3>Advanced Search Techniques</h3>
                <p>Master the art of finding exactly what you need in the library's vast collection.</p>
                
                <h4>Search Strategies:</h4>
                <ul>
                    <li><strong>Boolean Operators:</strong> Use AND, OR, NOT to refine your search</li>
                    <li><strong>Wildcards:</strong> Use * or ? to find variations of words</li>
                    <li><strong>Phrase Searching:</strong> Use quotes for exact phrases</li>
                    <li><strong>Field Searching:</strong> Search within specific fields (title, author, subject)</li>
                </ul>
                
                <h4>Advanced Features:</h4>
                <p>Learn to use filters, facets, and advanced search options to narrow down results effectively.</p>
            `,
            module3: `
                <h3>Digital Library Access</h3>
                <p>Access the library's digital resources from anywhere, anytime.</p>
                
                <h4>Digital Resources:</h4>
                <ul>
                    <li>E-books and E-journals</li>
                    <li>Online databases</li>
                    <li>Digital archives</li>
                    <li>Multimedia resources</li>
                </ul>
                
                <h4>Access Methods:</h4>
                <p>Learn how to access digital resources through the library portal, mobile apps, and remote access options.</p>
            `,
            module4: `
                <h3>Citation and Referencing</h3>
                <p>Master the art of proper citation and referencing in your academic work.</p>
                
                <h4>Citation Styles:</h4>
                <ul>
                    <li>APA (American Psychological Association)</li>
                    <li>MLA (Modern Language Association)</li>
                    <li>Chicago/Turabian</li>
                    <li>Harvard</li>
                </ul>
                
                <h4>Citation Tools:</h4>
                <p>Learn to use citation management tools like Zotero, Mendeley, and EndNote to organize your references.</p>
            `
        };

        contentDiv.innerHTML = moduleData[selectedModule] || `
            <h3>Select a module to view its content</h3>
            <p>Choose a module from the dropdown above to see detailed information about library resources and search techniques.</p>
        `;
    }

    function openMessageModal(messageId, content) {
        // Implement message modal functionality
        alert(content); // For now, just show an alert
    }

    function confirmDelete(messageId) {
        if (confirm('Are you sure you want to delete this message?')) {
            fetch(`/message/${messageId}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
                    messageElement.remove();
                }
            });
        }
    }
</script>
@endsection
